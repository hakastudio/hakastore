<?php
/**
 * HakaStore Theme Auto-Updater via GitHub Releases
 * Memungkinkan WordPress memeriksa pembaruan dan memperbarui tema HakaStore
 * secara otomatis 1-klik langsung dari dashboard Tampilan > Tema / Dasbor > Pembaruan.
 */

defined( 'ABSPATH' ) || exit;

class HakaStore_Theme_Updater {

    private $theme_slug;
    private $version;
    private $github_user;
    private $github_repo;
    private $transient_key;

    public function __construct( $theme_slug, $version, $github_user, $github_repo ) {
        $this->theme_slug    = $theme_slug;
        $this->version       = $version;
        $this->github_user   = $github_user;
        $this->github_repo   = $github_repo;
        $this->transient_key = 'hakastore_github_update_' . md5( $github_user . $github_repo );

        // Hook ke pengecekan pembaruan tema WordPress
        add_filter( 'pre_set_site_transient_update_themes', [ $this, 'check_update' ] );
        
        // Hook untuk popup rincian tema / changelog di dashboard
        add_filter( 'themes_api', [ $this, 'theme_popup' ], 20, 3 );
        
        // Memastikan nama folder tujuan tetap 'hakastore' setelah diekstrak
        add_filter( 'upgrader_source_selection', [ $this, 'fix_folder_name' ], 10, 4 );

        // Bersihkan cache jika admin menekan tombol "Periksa Lagi" di Dashboard > Pembaruan
        add_action( 'load-update-core.php', [ $this, 'clear_transient' ] );
    }

    /**
     * Mengambil data rilis terbaru dari GitHub API
     */
    private function get_github_release() {
        $cached = get_transient( $this->transient_key );
        if ( false !== $cached ) {
            return $cached;
        }

        $api_url = sprintf(
            'https://api.github.com/repos/%s/%s/releases/latest',
            $this->github_user,
            $this->github_repo
        );

        $response = wp_remote_get( $api_url, [
            'timeout'    => 10,
            'user-agent' => 'WordPress/' . get_bloginfo( 'version' ) . '; ' . home_url(),
            'headers'    => [
                'Accept' => 'application/vnd.github.v3+json',
            ],
        ] );

        if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
            // Cache kegagalan sementara selama 1 jam agar tidak membebani server
            set_transient( $this->transient_key, null, HOUR_IN_SECONDS );
            return null;
        }

        $body = wp_remote_retrieve_body( $response );
        $data = json_decode( $body );

        if ( ! empty( $data ) && ! empty( $data->tag_name ) ) {
            // Simpan cache selama 6 jam
            set_transient( $this->transient_key, $data, 6 * HOUR_IN_SECONDS );
            return $data;
        }

        return null;
    }

    /**
     * Memeriksa versi baru saat WordPress melakukan transient update
     */
    public function check_update( $transient ) {
        if ( empty( $transient->checked ) ) {
            return $transient;
        }

        $release = $this->get_github_release();
        if ( ! $release ) {
            return $transient;
        }

        // Hapus huruf 'v' di awal tag versi jika ada (contoh: 'v1.0.1' -> '1.0.1')
        $remote_version = ltrim( $release->tag_name, 'v' );

        // Bandingkan versi lokal dengan versi di GitHub
        if ( version_compare( $this->version, $remote_version, '<' ) ) {
            
            // Cari link paket hakastore.zip di assets rilis GitHub
            $package_url = '';
            if ( ! empty( $release->assets ) && is_array( $release->assets ) ) {
                foreach ( $release->assets as $asset ) {
                    if ( 'hakastore.zip' === $asset->name ) {
                        $package_url = $asset->browser_download_url;
                        break;
                    }
                }
            }

            // Jika asset spesifik belum ada, gunakan fallback download zip URL rilis GitHub
            if ( empty( $package_url ) ) {
                $package_url = sprintf(
                    'https://github.com/%s/%s/releases/download/%s/hakastore.zip',
                    $this->github_user,
                    $this->github_repo,
                    $release->tag_name
                );
            }

            $update_data = [
                'theme'       => $this->theme_slug,
                'new_version' => $remote_version,
                'url'         => $release->html_url,
                'package'     => $package_url,
            ];

            $transient->response[ $this->theme_slug ] = $update_data;
        }

        return $transient;
    }

    /**
     * Menampilkan popup informasi pembaruan (Changelog) di dashboard WP
     */
    public function theme_popup( $result, $action, $args ) {
        if ( 'theme_information' !== $action || empty( $args->slug ) || $this->theme_slug !== $args->slug ) {
            return $result;
        }

        $release = $this->get_github_release();
        if ( ! $release ) {
            return $result;
        }

        $remote_version = ltrim( $release->tag_name, 'v' );

        $theme_info = (object) [
            'name'          => 'HakaStore Official Store',
            'slug'          => $this->theme_slug,
            'version'       => $remote_version,
            'author'        => 'HakaStore Team',
            'preview_url'   => 'https://github.com/' . $this->github_user . '/' . $this->github_repo,
            'requires'      => '6.0',
            'tested'        => '6.7',
            'requires_php'  => '8.0',
            'sections'      => [
                'description' => 'Tema WordPress e-commerce modern Dark Luxury & Gold untuk produk digital dan fisik.',
                'changelog'   => nl2br( esc_html( $release->body ?? 'Pembaruan rutin dan peningkatan performa.' ) ),
            ],
            'download_link' => sprintf(
                'https://github.com/%s/%s/releases/download/%s/hakastore.zip',
                $this->github_user,
                $this->github_repo,
                $release->tag_name
            ),
        ];

        return $theme_info;
    }

    /**
     * Menjaga nama folder tema tetap 'hakastore' setelah proses ekstraksi ZIP
     */
    public function fix_folder_name( $source, $remote_source, $upgrader, $hook_extra = null ) {
        global $wp_filesystem;

        // Pastikan proses ini hanya untuk tema hakastore
        if ( ! isset( $hook_extra['theme'] ) || $this->theme_slug !== $hook_extra['theme'] ) {
            return $source;
        }

        $proper_destination = trailingslashit( $remote_source ) . $this->theme_slug . '/';

        if ( $source !== $proper_destination ) {
            $wp_filesystem->move( $source, $proper_destination );
            return $proper_destination;
        }

        return $source;
    }

    /**
     * Bersihkan cache transient pengecekan GitHub
     */
    public function clear_transient() {
        delete_transient( $this->transient_key );
    }
}
