<?php
/**
 * HakaStore - WordPress Theme Customizer Options
 * Memungkinkan semua fitur, teks, warna, kontak, dan banner diatur langsung lewat
 * menu Tampilan > Sesuaikan (Appearance > Customize) di WordPress Admin.
 */

defined( 'ABSPATH' ) || exit;

function hakastore_customize_register( $wp_customize ) {

    // =========================================================================
    // PANEL: PENGATURAN HAKASTORE STORE
    // =========================================================================
    $wp_customize->add_panel( 'hakastore_theme_panel', [
        'title'       => __( '⚡ Pengaturan HakaStore Store', 'hakastore' ),
        'description' => __( 'Kelola seluruh konten, tampilan, dan fitur toko resmi HakaStore.', 'hakastore' ),
        'priority'    => 20,
    ] );

    // -------------------------------------------------------------------------
    // 1. SEKSI IDENTITAS & WARNA
    // -------------------------------------------------------------------------
    $wp_customize->add_section( 'hakastore_branding_section', [
        'title'    => __( '🎨 Warna & Identitas Toko', 'hakastore' ),
        'panel'    => 'hakastore_theme_panel',
        'priority' => 10,
    ] );

    // Warna Aksen Gold
    $wp_customize->add_setting( 'hakastore_gold_color', [
        'default'           => '#D4AF37',
        'sanitize_callback' => 'sanitize_hex_color',
    ] );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hakastore_gold_color', [
        'label'    => __( 'Warna Aksen Utama (Gold)', 'hakastore' ),
        'section'  => 'hakastore_branding_section',
    ] ) );

    // Label Toko Resmi
    $wp_customize->add_setting( 'hakastore_store_label', [
        'default'           => 'HakaStore Official Store',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'hakastore_store_label', [
        'label'    => __( 'Nama / Label Toko Resmi', 'hakastore' ),
        'section'  => 'hakastore_branding_section',
        'type'     => 'text',
    ] );

    // -------------------------------------------------------------------------
    // 2. SEKSI HERO BANNER BERANDA
    // -------------------------------------------------------------------------
    $wp_customize->add_section( 'hakastore_hero_section', [
        'title'    => __( '🏠 Hero Banner Beranda', 'hakastore' ),
        'panel'    => 'hakastore_theme_panel',
        'priority' => 20,
    ] );

    // Eyebrow (Teks Kecil di atas Judul)
    $wp_customize->add_setting( 'hakastore_hero_eyebrow', [
        'default'           => 'Toko Resmi Terverifikasi',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'hakastore_hero_eyebrow', [
        'label'    => __( 'Teks Label Kecil (Eyebrow)', 'hakastore' ),
        'section'  => 'hakastore_hero_section',
        'type'     => 'text',
    ] );

    // Judul Utama (Heading)
    $wp_customize->add_setting( 'hakastore_hero_title', [
        'default'           => 'Temukan Produk Berkualitas dari HakaStore',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'hakastore_hero_title', [
        'label'    => __( 'Judul Utama Hero', 'hakastore' ),
        'section'  => 'hakastore_hero_section',
        'type'     => 'text',
    ] );

    // Subtitle / Deskripsi Hero
    $wp_customize->add_setting( 'hakastore_hero_desc', [
        'default'           => 'Pusat belanja resmi produk digital (template, source code, kursus, ebook) dan produk fisik bergaransi langsung dari HakaStore. Transaksi aman, instan & terpercaya.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );
    $wp_customize->add_control( 'hakastore_hero_desc', [
        'label'    => __( 'Deskripsi Singkat Hero', 'hakastore' ),
        'section'  => 'hakastore_hero_section',
        'type'     => 'textarea',
    ] );

    // Tombol 1 Teks & Link
    $wp_customize->add_setting( 'hakastore_hero_btn1_text', [
        'default'           => 'Jelajahi Produk',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'hakastore_hero_btn1_text', [
        'label'    => __( 'Teks Tombol Utama', 'hakastore' ),
        'section'  => 'hakastore_hero_section',
        'type'     => 'text',
    ] );

    // -------------------------------------------------------------------------
    // 3. SEKSI KEUNGGULAN TOKO (4 FITUR UTAMA)
    // -------------------------------------------------------------------------
    $wp_customize->add_section( 'hakastore_perks_section', [
        'title'    => __( '⭐ Keunggulan Toko (4 Poin)', 'hakastore' ),
        'panel'    => 'hakastore_theme_panel',
        'priority' => 30,
    ] );

    for ( $i = 1; $i <= 4; $i++ ) {
        $defaults_title = [
            1 => 'Instant Download 24/7',
            2 => 'Pengiriman Cepat & Berresi',
            3 => 'Garansi Kepuasan 100%',
            4 => 'Pembayaran Otomatis',
        ];
        $defaults_desc = [
            1 => 'File digital langsung aktif otomatis setelah pembayaran diverifikasi tanpa menunggu konfirmasi manual.',
            2 => 'Pengemasan rapi dan aman dengan bubble wrap. Resi kurir terintegrasi otomatis untuk pelacakan mudah.',
            3 => 'Dukungan penuh jika ada kendala unduhan file, serta garansi retur/tukar produk fisik hingga 7 hari.',
            4 => 'Dukung QRIS instan semua bank/e-wallet, Virtual Account BCA/Mandiri/BRI, serta GoPay, OVO, dan Dana.',
        ];

        $wp_customize->add_setting( "hakastore_perk_{$i}_title", [
            'default'           => $defaults_title[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ] );
        $wp_customize->add_control( "hakastore_perk_{$i}_title", [
            'label'    => sprintf( __( 'Poin %d: Judul', 'hakastore' ), $i ),
            'section'  => 'hakastore_perks_section',
            'type'     => 'text',
        ] );

        $wp_customize->add_setting( "hakastore_perk_{$i}_desc", [
            'default'           => $defaults_desc[$i],
            'sanitize_callback' => 'sanitize_textarea_field',
        ] );
        $wp_customize->add_control( "hakastore_perk_{$i}_desc", [
            'label'    => sprintf( __( 'Poin %d: Deskripsi', 'hakastore' ), $i ),
            'section'  => 'hakastore_perks_section',
            'type'     => 'textarea',
        ] );
    }

    // -------------------------------------------------------------------------
    // 4. SEKSI BANNER AJAKAN DAFTAR PEMBELI
    // -------------------------------------------------------------------------
    $wp_customize->add_section( 'hakastore_member_banner_section', [
        'title'    => __( '🎁 Banner Akun Pelanggan', 'hakastore' ),
        'panel'    => 'hakastore_theme_panel',
        'priority' => 40,
    ] );

    $wp_customize->add_setting( 'hakastore_banner_title', [
        'default'           => 'Daftar Akun Pembeli & Dapatkan Akses Penuh',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'hakastore_banner_title', [
        'label'    => __( 'Judul Banner', 'hakastore' ),
        'section'  => 'hakastore_member_banner_section',
        'type'     => 'text',
    ] );

    $wp_customize->add_setting( 'hakastore_banner_desc', [
        'default'           => 'Buat akun pembeli untuk menikmati kemudahan riwayat pesanan, unduh ulang file digital kapan saja seumur hidup, dan simpan alamat pengiriman favoritmu.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );
    $wp_customize->add_control( 'hakastore_banner_desc', [
        'label'    => __( 'Deskripsi Banner', 'hakastore' ),
        'section'  => 'hakastore_member_banner_section',
        'type'     => 'textarea',
    ] );

    // -------------------------------------------------------------------------
    // 5. SEKSI KONTAK, SOSIAL MEDIA & FOOTER
    // -------------------------------------------------------------------------
    $wp_customize->add_section( 'hakastore_contact_section', [
        'title'    => __( '📞 Kontak & Sosial Media', 'hakastore' ),
        'panel'    => 'hakastore_theme_panel',
        'priority' => 50,
    ] );

    $wp_customize->add_setting( 'hakastore_whatsapp', [
        'default'           => '6281234567890',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'hakastore_whatsapp', [
        'label'       => __( 'Nomor WhatsApp Admin', 'hakastore' ),
        'description' => __( 'Gunakan format internasional tanpa tanda + (contoh: 6281234567890)', 'hakastore' ),
        'section'     => 'hakastore_contact_section',
        'type'        => 'text',
    ] );

    $wp_customize->add_setting( 'hakastore_instagram', [
        'default'           => 'https://instagram.com',
        'sanitize_callback' => 'esc_url_raw',
    ] );
    $wp_customize->add_control( 'hakastore_instagram', [
        'label'    => __( 'Link Instagram', 'hakastore' ),
        'section'  => 'hakastore_contact_section',
        'type'     => 'url',
    ] );

    $wp_customize->add_setting( 'hakastore_footer_text', [
        'default'           => 'Toko resmi terpercaya untuk produk digital dan fisik. Dilayani langsung oleh HakaStore dengan jaminan kepuasan pelanggan.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );
    $wp_customize->add_control( 'hakastore_footer_text', [
        'label'    => __( 'Deskripsi Footer', 'hakastore' ),
        'section'  => 'hakastore_contact_section',
        'type'     => 'textarea',
    ] );
}
add_action( 'customize_register', 'hakastore_customize_register' );

/**
 * Output dynamic CSS from Customizer settings
 */
function hakastore_customizer_css() {
    $gold_color = get_theme_mod( 'hakastore_gold_color', '#D4AF37' );
    if ( $gold_color !== '#D4AF37' ) {
        echo "<style type='text/css'>
            :root {
                --color-gold: {$gold_color};
            }
        </style>";
    }
}
add_action( 'wp_head', 'hakastore_customizer_css' );
