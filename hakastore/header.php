<?php
/**
 * HakaStore - Site Header (Official Store Edition)
 */
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header" role="banner">
  <nav class="nav-inner" aria-label="<?php esc_attr_e('Navigasi Utama','hakastore'); ?>">

    <!-- Brand -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-brand" aria-label="<?php bloginfo('name'); ?> - Beranda">
      <div class="site-brand__logo" aria-hidden="true">H</div>
      <span class="site-brand__name">Haka<span>Times</span></span>
    </a>

    <!-- Search -->
    <div class="nav-search" role="search">
      <svg class="nav-search__icon" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
      </svg>
      <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input
          type="search"
          id="nav-search-input"
          class="nav-search__input"
          name="s"
          placeholder="<?php esc_attr_e('Cari produk digital atau fisik...','hakastore'); ?>"
          value="<?php echo get_search_query(); ?>"
          aria-label="<?php esc_attr_e('Cari produk','hakastore'); ?>"
          autocomplete="off"
        >
        <button type="submit" class="nav-search__submit">
          <?php esc_html_e('Cari','hakastore'); ?>
        </button>
      </form>
      <div id="search-results-dropdown" class="search-dropdown" role="listbox" aria-live="polite" hidden></div>
    </div>

    <!-- Nav Menu -->
    <ul class="nav-menu" role="menubar">
      <li role="none">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-menu__link <?php echo is_front_page() ? 'current-menu-item' : ''; ?>" role="menuitem">
          <?php esc_html_e('Beranda','hakastore'); ?>
        </a>
      </li>
      <li role="none">
        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="nav-menu__link <?php echo is_shop() ? 'current-menu-item' : ''; ?>" role="menuitem">
          <?php esc_html_e('Katalog Produk','hakastore'); ?>
        </a>
      </li>
      <li role="none">
        <a href="<?php echo esc_url(add_query_arg('filter_type', 'digital', wc_get_page_permalink('shop'))); ?>" class="nav-menu__link nav-menu__link--category" role="menuitem">
          <?php esc_html_e('Produk Digital','hakastore'); ?>
        </a>
      </li>
      <li role="none">
        <a href="<?php echo esc_url(add_query_arg('filter_type', 'physical', wc_get_page_permalink('shop'))); ?>" class="nav-menu__link nav-menu__link--category" role="menuitem">
          <?php esc_html_e('Produk Fisik','hakastore'); ?>
        </a>
      </li>
      <li role="none">
        <a href="<?php echo esc_url(home_url('/#cara-kerja')); ?>" class="nav-menu__link" role="menuitem">
          <?php esc_html_e('Cara Order','hakastore'); ?>
        </a>
      </li>
    </ul>

    <!-- Actions (Buyers Only) -->
    <div class="nav-actions">
      <?php if ( is_user_logged_in() ) : ?>
        <a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>" class="nav-icon-btn" aria-label="<?php esc_attr_e('Akun & Pesanan Saya','hakastore'); ?>" title="Pesanan Saya">
          <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
          </svg>
        </a>
      <?php else : ?>
        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="btn btn--ghost btn--sm" id="nav-login-btn">
          <?php esc_html_e('Masuk','hakastore'); ?>
        </a>
        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="btn btn--primary btn--sm" id="nav-register-btn">
          <?php esc_html_e('Daftar Akun','hakastore'); ?>
        </a>
      <?php endif; ?>

      <?php if ( function_exists('WC') ) : ?>
        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="nav-icon-btn" id="cart-btn" aria-label="<?php esc_attr_e('Keranjang belanja','hakastore'); ?>">
          <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
          <span class="nav-icon-btn__badge" id="cart-count">
            <?php echo WC()->cart->get_cart_contents_count(); ?>
          </span>
        </a>
      <?php endif; ?>

      <!-- Mobile toggle -->
      <button class="nav-toggle" id="nav-toggle" aria-expanded="false" aria-controls="mobile-menu" aria-label="<?php esc_attr_e('Buka menu','hakastore'); ?>">
        <svg id="icon-menu" width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg id="icon-close" width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" style="display:none">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>

    </div>
  </nav>
</header>

<!-- Mobile Menu (Buyers Only) -->
<div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="false" aria-label="<?php esc_attr_e('Menu Mobile','hakastore'); ?>" hidden>
  <div class="mobile-search" role="search">
    <svg class="nav-search__icon" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
    </svg>
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>" style="width:100%">
      <input type="search" class="form-input" name="s" placeholder="<?php esc_attr_e('Cari produk...','hakastore'); ?>" value="<?php echo get_search_query(); ?>" style="padding-left:2.75rem">
    </form>
  </div>
  <nav class="mobile-menu__nav" aria-label="<?php esc_attr_e('Menu Mobile','hakastore'); ?>">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-menu__link"><?php esc_html_e('Beranda','hakastore'); ?></a>
    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="mobile-menu__link"><?php esc_html_e('Katalog Toko','hakastore'); ?></a>
    <a href="<?php echo esc_url(add_query_arg('filter_type', 'digital', wc_get_page_permalink('shop'))); ?>" class="mobile-menu__link"><?php esc_html_e('Produk Digital','hakastore'); ?></a>
    <a href="<?php echo esc_url(add_query_arg('filter_type', 'physical', wc_get_page_permalink('shop'))); ?>" class="mobile-menu__link"><?php esc_html_e('Produk Fisik','hakastore'); ?></a>
    <a href="<?php echo esc_url(home_url('/#cara-kerja')); ?>" class="mobile-menu__link"><?php esc_html_e('Cara Pembelian','hakastore'); ?></a>
  </nav>
  <div class="mobile-menu__actions">
    <?php if ( is_user_logged_in() ) : ?>
      <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="btn btn--ghost"><?php esc_html_e('Akun & Pesanan Saya','hakastore'); ?></a>
      <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="btn btn--outline"><?php esc_html_e('Keluar','hakastore'); ?></a>
    <?php else : ?>
      <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="btn btn--ghost"><?php esc_html_e('Masuk Akun Pembeli','hakastore'); ?></a>
      <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="btn btn--primary"><?php esc_html_e('Daftar Pembeli Baru','hakastore'); ?></a>
    <?php endif; ?>
  </div>
</div>

<main id="main-content" tabindex="-1">
