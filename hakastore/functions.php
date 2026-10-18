<?php
/**
 * HakaStore Marketplace Theme Functions
 */

defined( 'ABSPATH' ) || exit;

define( 'HAKASTORE_VERSION', '1.0.2' );
define( 'HAKASTORE_DIR', get_template_directory() );
define( 'HAKASTORE_URI', get_template_directory_uri() );

// ── Safe WooCommerce Helpers (Fallback if WooCommerce is inactive) ──
function hakastore_is_wc_active() {
    return class_exists( 'WooCommerce' );
}

function hakastore_get_shop_url() {
    if ( function_exists( 'wc_get_page_permalink' ) ) {
        $url = wc_get_page_permalink( 'shop' );
        if ( $url && ! is_wp_error( $url ) && '-1' !== $url ) {
            return $url;
        }
    }
    return home_url( '/shop' );
}

function hakastore_get_cart_url() {
    if ( function_exists( 'wc_get_cart_url' ) ) {
        return wc_get_cart_url();
    }
    return home_url( '/cart' );
}

function hakastore_get_account_url( $endpoint = '' ) {
    if ( function_exists( 'wc_get_page_permalink' ) ) {
        $base = wc_get_page_permalink( 'myaccount' );
        if ( ! empty( $endpoint ) && function_exists( 'wc_get_account_endpoint_url' ) ) {
            return wc_get_account_endpoint_url( $endpoint );
        }
        if ( $base && ! is_wp_error( $base ) && '-1' !== $base ) {
            return $base;
        }
    }
    return home_url( '/my-account' );
}

// ── Setup ──────────────────────────────────────────────────
function hakastore_setup() {
    load_theme_textdomain( 'hakastore', HAKASTORE_DIR . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'customize-selective-refresh-widgets' );

    register_nav_menus( [
        'primary'  => __( 'Navigation Utama', 'hakastore' ),
        'footer'   => __( 'Footer Menu', 'hakastore' ),
        'mobile'   => __( 'Mobile Menu', 'hakastore' ),
    ] );

    add_image_size( 'hakastore-card',     400, 300, true );
    add_image_size( 'hakastore-featured', 800, 450, true );
    add_image_size( 'hakastore-thumb',    80,  80,  true );
}
add_action( 'after_setup_theme', 'hakastore_setup' );

// ── Enqueue ────────────────────────────────────────────────
function hakastore_enqueue() {
    wp_enqueue_style(
        'hakastore-main',
        HAKASTORE_URI . '/assets/css/main.css',
        [],
        HAKASTORE_VERSION
    );
    wp_enqueue_script(
        'hakastore-main',
        HAKASTORE_URI . '/assets/js/main.js',
        [],
        HAKASTORE_VERSION,
        true
    );
    wp_localize_script( 'hakastore-main', 'hakastoreData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'hakastore_nonce' ),
        'cartUrl' => hakastore_get_cart_url(),
    ] );
}
add_action( 'wp_enqueue_scripts', 'hakastore_enqueue' );

// ── Content Width ──────────────────────────────────────────
function hakastore_content_width() {
    $GLOBALS['content_width'] = 1280;
}
add_action( 'after_setup_theme', 'hakastore_content_width', 0 );

// ── Widgets ────────────────────────────────────────────────
function hakastore_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Shop Sidebar', 'hakastore' ),
        'id'            => 'shop-sidebar',
        'description'   => __( 'Filter widget untuk halaman toko.', 'hakastore' ),
        'before_widget' => '<div class="sidebar-widget" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar-widget__title">',
        'after_title'   => '</h3>',
    ] );
    register_sidebar( [
        'name'          => __( 'Footer Widget', 'hakastore' ),
        'id'            => 'footer-widget',
        'description'   => __( 'Widget area di footer.', 'hakastore' ),
        'before_widget' => '<div class="footer-widget" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget__title">',
        'after_title'   => '</h4>',
    ] );
}
add_action( 'widgets_init', 'hakastore_widgets_init' );

// ── WooCommerce Helpers & Wrappers ─────────────────────────
add_action( 'init', function() {
    if ( function_exists( 'remove_action' ) ) {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
        remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
        remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );
    }
} );

add_action( 'woocommerce_before_main_content', function() {
    echo '<div class="container"><div class="woocommerce-content">';
} );
add_action( 'woocommerce_after_main_content', function() {
    echo '</div></div>';
} );

// Product card columns
add_filter( 'loop_shop_columns', function() { return 4; } );
add_filter( 'loop_shop_per_page', function() { return 12; } );

// ── Cart Count AJAX ────────────────────────────────────────
add_action( 'wp_ajax_hakastore_cart_count', 'hakastore_cart_count' );
add_action( 'wp_ajax_nopriv_hakastore_cart_count', 'hakastore_cart_count' );
function hakastore_cart_count() {
    check_ajax_referer( 'hakastore_nonce', 'nonce' );
    $count = ( function_exists( 'WC' ) && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
    wp_send_json_success( [ 'count' => $count ] );
}

// ── Wishlist Toggle AJAX ───────────────────────────────────
add_action( 'wp_ajax_hakastore_wishlist_toggle', 'hakastore_wishlist_toggle' );
add_action( 'wp_ajax_nopriv_hakastore_wishlist_toggle', 'hakastore_wishlist_toggle_nopriv' );
function hakastore_wishlist_toggle() {
    check_ajax_referer( 'hakastore_nonce', 'nonce' );
    $product_id = intval( $_POST['product_id'] ?? 0 );
    if ( ! $product_id ) wp_send_json_error( 'Invalid product' );
    $wishlist = (array) get_user_meta( get_current_user_id(), 'hakastore_wishlist', true );
    if ( in_array( $product_id, $wishlist ) ) {
        $wishlist = array_diff( $wishlist, [ $product_id ] );
        $added = false;
    } else {
        $wishlist[] = $product_id;
        $added = true;
    }
    update_user_meta( get_current_user_id(), 'hakastore_wishlist', $wishlist );
    wp_send_json_success( [ 'added' => $added ] );
}
function hakastore_wishlist_toggle_nopriv() {
    wp_send_json_error( 'login_required' );
}

// ── Search AJAX ────────────────────────────────────────────
add_action( 'wp_ajax_hakastore_live_search', 'hakastore_live_search' );
add_action( 'wp_ajax_nopriv_hakastore_live_search', 'hakastore_live_search' );
function hakastore_live_search() {
    check_ajax_referer( 'hakastore_nonce', 'nonce' );
    $q = sanitize_text_field( $_GET['q'] ?? '' );
    if ( strlen( $q ) < 2 ) wp_send_json_success( [] );
    $results = get_posts( [
        'post_type'      => 'product',
        'posts_per_page' => 5,
        's'              => $q,
        'post_status'    => 'publish',
    ] );
    $data = array_map( function( $p ) {
        $product = function_exists( 'wc_get_product' ) ? wc_get_product( $p->ID ) : null;
        return [
            'id'    => $p->ID,
            'title' => get_the_title( $p->ID ),
            'price' => $product ? $product->get_price_html() : '',
            'thumb' => get_the_post_thumbnail_url( $p->ID, 'hakastore-thumb' ) ?: '',
            'url'   => get_permalink( $p->ID ),
        ];
    }, $results );
    wp_send_json_success( $data );
}

// ── Allowed Block Editor Patterns ────────────────────────────
add_action( 'init', function() {
    remove_theme_support( 'core-block-patterns' );
} );

// ── Helper: Product type badge ─────────────────────────────
function hakastore_product_type_badge( $product_id ) {
    if ( ! function_exists( 'wc_get_product' ) ) return '';
    $product = wc_get_product( $product_id );
    if ( ! $product ) return '';
    $type = $product->get_type();
    if ( $product->is_virtual() || $type === 'digital' ) {
        return '<span class="badge badge--digital">Digital</span>';
    }
    return '<span class="badge badge--physical">Fisik</span>';
}

// ── Query Filter: Digital vs Physical Products ─────────────
add_action( 'woocommerce_product_query', 'hakastore_filter_product_types' );
function hakastore_filter_product_types( $q ) {
    if ( is_admin() || ! $q->is_main_query() ) return;

    $filter_type = sanitize_text_field( $_GET['filter_type'] ?? '' );
    if ( $filter_type === 'digital' ) {
        $meta_query = (array) $q->get( 'meta_query' );
        $meta_query[] = [
            'key'     => '_virtual',
            'value'   => 'yes',
            'compare' => '=',
        ];
        $q->set( 'meta_query', $meta_query );
    } elseif ( $filter_type === 'physical' ) {
        $meta_query = (array) $q->get( 'meta_query' );
        $meta_query[] = [
            'relation' => 'OR',
            [
                'key'     => '_virtual',
                'value'   => 'no',
                'compare' => '=',
            ],
            [
                'key'     => '_virtual',
                'compare' => 'NOT EXISTS',
            ],
        ];
        $q->set( 'meta_query', $meta_query );
    }
}

// ── Enforce Buyer-Only Registration & Security ─────────────
// Ensure only 'customer' role is assigned to new sign-ups
add_filter( 'pre_option_default_role', function() {
    return 'customer';
} );

// Hide WordPress admin bar for non-management users
add_action( 'after_setup_theme', function() {
    if ( ! current_user_can( 'edit_posts' ) && ! is_admin() ) {
        show_admin_bar( false );
    }
} );

// Block customers from accessing wp-admin dashboard directly
add_action( 'admin_init', function() {
    // Jangan redirect jika sedang AJAX, WP Cron, atau dalam mode Customizer / Live Preview
    if ( wp_doing_ajax() || wp_doing_cron() || is_customize_preview() ) {
        return;
    }
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_safe_redirect( hakastore_get_account_url() );
        exit;
    }
} );

// ── Admin Notice if WooCommerce is not active ──────────────
add_action( 'admin_notices', function() {
    if ( ! hakastore_is_wc_active() && current_user_can( 'activate_plugins' ) ) {
        echo '<div class="notice notice-info is-dismissible">
            <p><strong>HakaStore Theme:</strong> Untuk mengaktifkan fitur katalog produk, keranjang belanja, dan sistem unduhan file digital otomatis, silakan pasang dan aktifkan plugin <strong>WooCommerce</strong>.</p>
        </div>';
    }
} );

// ── Include Customizer & Demo Data ─────────────────────────
if ( file_exists( HAKASTORE_DIR . '/inc/customizer.php' ) ) {
    require_once HAKASTORE_DIR . '/inc/customizer.php';
}

if ( file_exists( HAKASTORE_DIR . '/inc/demo-data.php' ) ) {
    require_once HAKASTORE_DIR . '/inc/demo-data.php';
}

// ── GitHub Auto-Update Feature ─────────────────────────────
if ( file_exists( HAKASTORE_DIR . '/inc/class-theme-updater.php' ) ) {
    require_once HAKASTORE_DIR . '/inc/class-theme-updater.php';
    new HakaStore_Theme_Updater(
        'hakastore',
        HAKASTORE_VERSION,
        'hakastudio',
        'hakastore'
    );
}
