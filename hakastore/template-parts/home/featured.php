<?php
defined('ABSPATH') || exit;

// Guard: only render if WooCommerce is active
if ( ! class_exists('WP_Query') || ! function_exists('wc_get_product') ) return;

$featured_args = [
  'post_type'      => 'product',
  'posts_per_page' => 4,
  'meta_query'     => [[ 'key' => '_featured', 'value' => 'yes' ]],
  'post_status'    => 'publish',
];
$featured = new WP_Query($featured_args);
if ( ! $featured->have_posts() ) {
  $featured = new WP_Query(['post_type'=>'product','posts_per_page'=>4,'post_status'=>'publish','orderby'=>'date','order'=>'DESC']);
}
if ( ! $featured->have_posts() ) return;
$posts = $featured->posts;
$main  = array_shift($posts);
?>
<section class="featured-section" id="unggulan" aria-labelledby="featured-heading">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-eyebrow"><?php esc_html_e('Pilihan Editor','hakastore'); ?></p>
      <h2 class="section-title" id="featured-heading">
        Produk <em><?php esc_html_e('Unggulan','hakastore'); ?></em>
      </h2>
    </div>
    <div class="featured-grid">

      <!-- Main featured -->
      <div class="featured-main reveal">
        <?php
        $main_product = wc_get_product($main->ID);
        $thumb = get_the_post_thumbnail_url($main->ID, 'hakastore-featured');
        ?>
        <div class="featured-main__thumb">
          <?php if ($thumb): ?>
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title($main->ID)); ?>" loading="lazy">
          <?php else: ?>
            <span aria-hidden="true">🌟</span>
          <?php endif; ?>
        </div>
        <div class="featured-main__body">
          <p class="featured-main__badge">
            <?php echo hakastore_product_type_badge($main->ID); ?>
            <?php esc_html_e('Produk Pilihan','hakastore'); ?>
          </p>
          <h3 class="featured-main__name">
            <a href="<?php echo esc_url(get_permalink($main->ID)); ?>">
              <?php echo esc_html(get_the_title($main->ID)); ?>
            </a>
          </h3>
          <p class="featured-main__desc"><?php echo esc_html(wp_trim_words(get_the_excerpt($main->ID), 20, '...')); ?></p>
          <div class="featured-main__footer">
            <div>
              <?php if ($main_product): ?>
                <div class="product-card__price-current"><?php echo $main_product->get_price_html(); ?></div>
              <?php endif; ?>
            </div>
            <a href="<?php echo esc_url(get_permalink($main->ID)); ?>" class="btn btn--primary">
              <?php esc_html_e('Lihat Produk','hakastore'); ?>
            </a>
          </div>
        </div>
      </div>

      <!-- Side items -->
      <div class="featured-side">
        <?php foreach ($posts as $i => $post):
          $product = wc_get_product($post->ID);
          $thumb   = get_the_post_thumbnail_url($post->ID, 'hakastore-thumb');
        ?>
        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"
           class="featured-item reveal reveal-delay-<?php echo $i+1; ?>"
           aria-label="<?php echo esc_attr(get_the_title($post->ID)); ?>">
          <div class="featured-item__thumb">
            <?php if ($thumb): ?>
              <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>" loading="lazy">
            <?php else: ?>
              <span aria-hidden="true">📦</span>
            <?php endif; ?>
          </div>
          <div class="featured-item__content">
            <div class="featured-item__name"><?php echo esc_html(get_the_title($post->ID)); ?></div>
            <div class="featured-item__meta"><?php echo hakastore_product_type_badge($post->ID); ?></div>
            <?php if ($product): ?>
              <div class="featured-item__price"><?php echo $product->get_price_html(); ?></div>
            <?php endif; ?>
          </div>
        </a>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>
<?php wp_reset_postdata(); ?>
