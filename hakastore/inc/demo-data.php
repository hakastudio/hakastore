<?php
/**
 * HakaStore - Demo Data & Sample Product Populator
 * Allows instant population of digital & physical products for testing
 */
defined( 'ABSPATH' ) || exit;

function hakastore_install_sample_products() {
    if ( ! class_exists('WC_Product') ) return;

    // Check if sample product already exists
    $existing = get_posts([
        'post_type'   => 'product',
        'meta_key'    => '_hakastore_demo',
        'numberposts' => 1,
    ]);
    if ( ! empty($existing) ) return;

    $sample_products = [
        [
            'name'        => 'Paket Template UI Dashboard Pro - Figma & React',
            'type'        => 'digital',
            'price'       => '185000',
            'regular'     => '250000',
            'desc'        => 'Kit desain UI dashboard mewah dengan 120+ komponen modern, dukungan mode gelap dan terang, siap ekspor ke kode React & TailwindCSS.',
            'category'    => 'Desain & Template',
        ],
        [
            'name'        => 'Mastering Full-Stack Web Development: Ebook & Video Course',
            'type'        => 'digital',
            'price'       => '299000',
            'regular'     => '450000',
            'desc'        => 'Panduan komprehensif dari nol hingga mahir membuat aplikasi web modern, dilengkapi 45 video tutorial dan contoh source code lengkap.',
            'category'    => 'Kursus Online',
        ],
        [
            'name'        => 'Tas Ransel Kanvas Premium Waterproof - Haka Urban',
            'type'        => 'physical',
            'price'       => '245000',
            'regular'     => '299000',
            'desc'        => 'Tas punggung berbahan kanvas tebal dengan lapisan anti-air, kompartemen laptop 15.6 inch, dan saku rahasia berresleting aman.',
            'category'    => 'Fashion & Pakaian',
        ],
        [
            'name'        => 'Keyboard Mekanikal Wireless RGB 75% Custom Edition',
            'type'        => 'physical',
            'price'       => '650000',
            'regular'     => '750000',
            'desc'        => 'Keyboard mekanikal 75% dengan konektivitas Tri-Mode (Bluetooth, 2.4GHz Dongle, Type-C), hot-swappable switches, dan lampu RGB dinamis.',
            'category'    => 'Elektronik',
        ],
        [
            'name'        => 'Koleksi 500+ Preset Lightroom Cinematic Tone',
            'type'        => 'digital',
            'price'       => '99000',
            'regular'     => '150000',
            'desc'        => 'Paket preset foto estetik profesional untuk Lightroom Mobile & Desktop. Ciptakan foto bernuansa sinematik hanya dalam satu klik.',
            'category'    => 'Foto & Video',
        ],
        [
            'name'        => 'Tumbler Stainless Steel Termos Suhu LED 500ml',
            'type'        => 'physical',
            'price'       => '89000',
            'regular'     => '120000',
            'desc'        => 'Botol minum insulasi ganda tahan panas & dingin hingga 12 jam, dilengkapi sensor layar sentuh pintar pembaca suhu minuman.',
            'category'    => 'Rumah & Dekorasi',
        ],
    ];

    foreach ( $sample_products as $pdata ) {
        $product = new WC_Product_Simple();
        $product->set_name( $pdata['name'] );
        $product->set_regular_price( $pdata['regular'] );
        $product->set_sale_price( $pdata['price'] );
        $product->set_price( $pdata['price'] );
        $product->set_description( $pdata['desc'] );
        $product->set_short_description( wp_trim_words($pdata['desc'], 15) );
        $product->set_status( 'publish' );
        $product->set_manage_stock( false );
        $product->set_stock_status( 'instock' );

        if ( $pdata['type'] === 'digital' ) {
            $product->set_virtual( true );
            $product->set_downloadable( true );
        } else {
            $product->set_virtual( false );
        }

        $pid = $product->save();
        if ( $pid ) {
            update_post_meta( $pid, '_hakastore_demo', 'yes' );
            if ( $pdata['category'] ) {
                wp_set_object_terms( $pid, $pdata['category'], 'product_cat' );
            }
        }
    }
}
add_action( 'after_switch_theme', 'hakastore_install_sample_products' );
