<?php
/**
 * HakaStore - Search Results Template
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div style="padding: 3rem 0 6rem">
  <div class="container">
    <div class="shop-header">
      <p class="section-eyebrow"><?php esc_html_e('Hasil Pencarian', 'hakastore'); ?></p>
      <h1 class="section-title">
        "<?php echo get_search_query(); ?>"
      </h1>
      <p class="section-subtitle">
        <?php printf( esc_html__('Ditemukan %s hasil yang cocok dengan pencarianmu.', 'hakastore'), $wp_query->found_posts ); ?>
      </p>
    </div>

    <?php if ( have_posts() ) : ?>
      <div class="products-grid" style="grid-template-columns: repeat(4, 1fr)">
        <?php while ( have_posts() ) : the_post();
          $pid = get_the_ID();
          $product = function_exists('wc_get_product') ? wc_get_product( $pid ) : null;
        ?>
          <article class="product-card">
            <div class="product-card__thumb">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('hakastore-card'); ?>
              <?php else : ?>
                <div class="product-card__thumb-placeholder">📦</div>
              <?php endif; ?>
              <div class="product-card__badge">
                <?php echo hakastore_product_type_badge( $pid ); ?>
              </div>
            </div>
            <div class="product-card__body">
              <h3 class="product-card__name">
                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
              </h3>
            </div>
            <div class="product-card__footer">
              <div class="product-card__price">
                <?php if ( $product ) echo $product->get_price_html(); ?>
              </div>
              <a href="<?php echo esc_url( get_permalink() ); ?>" class="product-card__add-btn">
                <?php esc_html_e('Lihat', 'hakastore'); ?>
              </a>
            </div>
          </article>
        <?php endwhile; ?>
      </div>

      <div class="pagination">
        <?php echo paginate_links(); ?>
      </div>
    <?php else : ?>
      <div style="background:var(--color-surface-card); border:1px solid var(--color-border); border-radius:var(--radius-xl); padding:4rem; text-align:center">
        <div style="font-size:3.5rem; margin-bottom:1rem">🔍</div>
        <h3 style="font-size:1.5rem; margin-bottom:0.75rem"><?php esc_html_e('Tidak ditemukan hasil', 'hakastore'); ?></h3>
        <p style="color:var(--color-text-secondary); margin-bottom:2rem"><?php esc_html_e('Coba cari dengan kata kunci lain atau telusuri kategori produk.', 'hakastore'); ?></p>
        <a href="<?php echo esc_url( hakastore_get_shop_url() ); ?>" class="btn btn--primary"><?php esc_html_e('Lihat Semua Produk', 'hakastore'); ?></a>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php
get_footer();
