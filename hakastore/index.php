<?php
/**
 * HakaStore - Main Index (Official Store Homepage with Customizer Support)
 */
defined('ABSPATH') || exit;
get_header();

$hero_eyebrow = get_theme_mod('hakastore_hero_eyebrow', 'Toko Resmi Terverifikasi');
$hero_title   = get_theme_mod('hakastore_hero_title', 'Temukan Produk Berkualitas dari HakaStore');
$hero_desc    = get_theme_mod('hakastore_hero_desc', 'Pusat belanja resmi produk digital (template, source code, kursus, ebook) dan produk fisik bergaransi langsung dari HakaStore. Transaksi aman, instan & terpercaya.');
$hero_btn1    = get_theme_mod('hakastore_hero_btn1_text', 'Jelajahi Produk');
?>

<!-- HERO SECTION -->
<section class="hero" id="hero" aria-labelledby="hero-heading">
  <div class="hero__bg" aria-hidden="true"></div>
  <div class="container">
    <div class="hero__inner">

      <div class="hero__content reveal">
        <p class="hero__eyebrow">
          <span class="hero__eyebrow-line" aria-hidden="true"></span>
          <?php echo esc_html($hero_eyebrow); ?>
        </p>
        <h1 class="hero__heading" id="hero-heading">
          <?php echo esc_html($hero_title); ?>
        </h1>
        <p class="hero__subheading">
          <?php echo esc_html($hero_desc); ?>
        </p>
        <div class="hero__actions">
          <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn--primary btn--lg" id="hero-shop-btn">
            <?php echo esc_html($hero_btn1); ?>
          </a>
          <a href="<?php echo esc_url(add_query_arg('filter_type', 'digital', wc_get_page_permalink('shop'))); ?>" class="btn btn--outline btn--lg" id="hero-digital-btn">
            ⚡ <?php esc_html_e('Produk Digital','hakastore'); ?>
          </a>
        </div>
        <div class="hero__trust">
          <div class="hero__trust-avatars" aria-hidden="true">
            <div class="hero__trust-avatar">⭐</div>
            <div class="hero__trust-avatar">🛡️</div>
            <div class="hero__trust-avatar">⚡</div>
          </div>
          <p class="hero__trust-text">
            <?php esc_html_e('Melayani','hakastore'); ?>
            <strong><?php esc_html_e('ribuan pelanggan puas','hakastore'); ?></strong>
            <?php esc_html_e('di seluruh Indonesia','hakastore'); ?>
          </p>
        </div>
      </div>

      <div class="hero__visual reveal reveal-delay-2">
        <div class="hero__product-showcase" aria-label="<?php esc_attr_e('Contoh produk di HakaStore','hakastore'); ?>">
          <div class="hero__showcase-header" aria-hidden="true">
            <span class="hero__showcase-dot"></span>
            <span class="hero__showcase-dot"></span>
            <span class="hero__showcase-dot"></span>
            <span class="hero__showcase-title">hakastore.com/official-store</span>
          </div>
          <div class="hero__showcase-body">
            <div class="mini-card">
              <div class="mini-card__thumb" aria-hidden="true">⚡</div>
              <div class="mini-card__name">Paket Template UI Pro</div>
              <div class="mini-card__price">Rp 185.000</div>
            </div>
            <div class="mini-card">
              <div class="mini-card__thumb" aria-hidden="true">🎓</div>
              <div class="mini-card__name">Kursus Web Dev Modern</div>
              <div class="mini-card__price">Rp 299.000</div>
            </div>
            <div class="mini-card">
              <div class="mini-card__thumb" aria-hidden="true">🎒</div>
              <div class="mini-card__name">Tas Kanvas Waterproof</div>
              <div class="mini-card__price">Rp 245.000</div>
            </div>
            <div class="mini-card">
              <div class="mini-card__thumb" aria-hidden="true">⌨️</div>
              <div class="mini-card__name">Keyboard Mekanikal 75%</div>
              <div class="mini-card__price">Rp 650.000</div>
            </div>
          </div>
        </div>
        <div class="hero__stat-pill hero__stat-pill--left" aria-label="100% Produk Original">
          <div>
            <div class="hero__stat-num">100%</div>
            <div class="hero__stat-label"><?php esc_html_e('Produk Original','hakastore'); ?></div>
          </div>
        </div>
        <div class="hero__stat-pill hero__stat-pill--right" aria-label="Instant Delivery">
          <div>
            <div class="hero__stat-num">24/7</div>
            <div class="hero__stat-label"><?php esc_html_e('Pengiriman Otomatis','hakastore'); ?></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- CATEGORY STRIP -->
<?php get_template_part('template-parts/home/categories'); ?>

<!-- FEATURED PRODUCTS -->
<?php get_template_part('template-parts/home/featured'); ?>

<!-- LATEST PRODUCTS -->
<?php get_template_part('template-parts/home/products'); ?>

<!-- HOW IT WORKS -->
<?php get_template_part('template-parts/home/how-it-works'); ?>

<!-- STORE PERKS & GUARANTEES -->
<?php get_template_part('template-parts/home/vendors'); ?>

<!-- MEMBER WELCOME BANNER -->
<?php get_template_part('template-parts/home/promo-banner'); ?>

<?php get_footer(); ?>
