<?php
defined('ABSPATH') || exit;
$products = wc_get_products(['status'=>'publish','limit'=>8,'orderby'=>'date','order'=>'DESC']);
if (empty($products)) return;
?>
<section class="products-section" id="produk-terbaru" aria-labelledby="products-heading">
  <div class="container">
    <div class="section-header reveal" style="display:flex;align-items:flex-end;justify-content:space-between;gap:1rem">
      <div>
        <p class="section-eyebrow"><?php esc_html_e('Katalog Resmi','hakastore'); ?></p>
        <h2 class="section-title" id="products-heading">
          <?php esc_html_e('Produk','hakastore'); ?> <em><?php esc_html_e('Terbaru','hakastore'); ?></em>
        </h2>
      </div>
      <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn--ghost" style="flex-shrink:0">
        <?php esc_html_e('Lihat Semua Produk','hakastore'); ?>
      </a>
    </div>

    <!-- Filter tabs -->
    <div class="products-filter-bar reveal">
      <div class="products-filter-tabs" role="tablist" aria-label="<?php esc_attr_e('Filter produk','hakastore'); ?>">
        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="filter-tab active" role="tab">
          <?php esc_html_e('Semua Produk','hakastore'); ?>
        </a>
        <a href="<?php echo esc_url(add_query_arg('filter_type','digital',wc_get_page_permalink('shop'))); ?>" class="filter-tab" role="tab">
          ⚡ <?php esc_html_e('Produk Digital','hakastore'); ?>
        </a>
        <a href="<?php echo esc_url(add_query_arg('filter_type','physical',wc_get_page_permalink('shop'))); ?>" class="filter-tab" role="tab">
          📦 <?php esc_html_e('Produk Fisik','hakastore'); ?>
        </a>
        <a href="<?php echo esc_url(add_query_arg('orderby','popularity',wc_get_page_permalink('shop'))); ?>" class="filter-tab" role="tab">
          🔥 <?php esc_html_e('Paling Populer','hakastore'); ?>
        </a>
      </div>
    </div>

    <div class="products-grid" id="products-grid">
      <?php foreach ($products as $i => $product):
        $pid   = $product->get_id();
        $thumb = get_the_post_thumbnail_url($pid,'hakastore-card');
        $rating= $product->get_average_rating();
        $reviews = $product->get_review_count();
      ?>
      <article class="product-card reveal reveal-delay-<?php echo min($i+1,4); ?>" aria-labelledby="pcard-<?php echo $pid; ?>">
        <div class="product-card__thumb">
          <?php if ($thumb): ?>
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy">
          <?php else: ?>
            <div class="product-card__thumb-placeholder" aria-hidden="true">
              <?php echo $product->is_virtual() ? '💾' : '📦'; ?>
            </div>
          <?php endif; ?>
          <div class="product-card__actions" role="group">
            <a href="<?php echo esc_url(get_permalink($pid)); ?>" class="product-card__action-btn" title="Lihat Detail">
              <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </a>
          </div>
          <div class="product-card__badge"><?php echo hakastore_product_type_badge($pid); ?></div>
        </div>
        <div class="product-card__body">
          <div class="product-card__seller">
            <div class="product-card__seller-avatar" style="background:var(--color-gold); color:#000">H</div>
            <span><?php esc_html_e('HakaStore Official Store','hakastore'); ?></span>
          </div>
          <h3 class="product-card__name" id="pcard-<?php echo $pid; ?>">
            <a href="<?php echo esc_url(get_permalink($pid)); ?>"><?php echo esc_html($product->get_name()); ?></a>
          </h3>
          <?php if ($reviews > 0): ?>
          <div class="product-card__meta">
            <span class="product-card__rating">⭐ <?php echo number_format($rating,1); ?></span>
            <span>(<?php echo $reviews; ?> ulasan)</span>
          </div>
          <?php endif; ?>
        </div>
        <div class="product-card__footer">
          <div class="product-card__price">
            <div class="product-card__price-current"><?php echo $product->get_price_html(); ?></div>
          </div>
          <?php if ($product->is_purchasable() && $product->is_in_stock()): ?>
          <button class="product-card__add-btn add-to-cart-btn" data-product-id="<?php echo $pid; ?>">
            <?php esc_html_e('Beli','hakastore'); ?>
          </button>
          <?php else: ?>
          <a href="<?php echo esc_url(get_permalink($pid)); ?>" class="product-card__add-btn">
            <?php esc_html_e('Lihat','hakastore'); ?>
          </a>
          <?php endif; ?>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
