<?php
/**
 * HakaStore - 404 Not Found Template
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div style="padding: 6rem 0 8rem; text-align: center">
  <div class="container" style="max-width: 600px">
    <div style="font-family:var(--font-heading); font-size: clamp(5rem, 12vw, 8rem); font-weight:900; line-height:1; color:var(--color-gold); text-shadow:0 0 40px rgba(212,175,55,0.3); margin-bottom:1rem">
      404
    </div>
    <h1 style="font-size: 2rem; margin-bottom: 1rem"><?php esc_html_e('Halaman Tidak Ditemukan', 'hakastore'); ?></h1>
    <p style="color: var(--color-text-secondary); margin-bottom: 2.5rem; line-height: 1.7">
      <?php esc_html_e('Maaf, halaman atau produk yang kamu cari tidak dapat ditemukan atau sudah dipindahkan oleh penjual.', 'hakastore'); ?>
    </p>

    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn--primary btn--lg">
        <?php esc_html_e('Kembali ke Beranda', 'hakastore'); ?>
      </a>
      <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="btn btn--outline btn--lg">
        <?php esc_html_e('Jelajahi Toko', 'hakastore'); ?>
      </a>
    </div>
  </div>
</div>

<?php
get_footer();
