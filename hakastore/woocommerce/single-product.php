<?php
/**
 * HakaStore - Single Product (Official Store Edition)
 */
defined( 'ABSPATH' ) || exit;
get_header();
?>
<div class="product-single">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); global $product; $product = wc_get_product( get_the_ID() ); ?>

    <nav class="product-info__breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb','hakastore'); ?>">
      <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Beranda','hakastore'); ?></a>
      <span aria-hidden="true">/</span>
      <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"><?php esc_html_e('Katalog Toko','hakastore'); ?></a>
      <span aria-hidden="true">/</span>
      <span aria-current="page"><?php echo esc_html(get_the_title()); ?></span>
    </nav>

    <div class="product-single__grid">

      <!-- Gallery -->
      <div class="product-gallery" id="product-gallery">
        <div class="product-gallery__main" id="gallery-main" aria-label="<?php esc_attr_e('Gambar produk utama','hakastore'); ?>">
          <?php
          $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
          if ($thumb): ?>
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" id="main-product-img">
          <?php else: ?>
            <span aria-hidden="true" style="font-size:5rem"><?php echo $product->is_virtual() ? '💾' : '📦'; ?></span>
          <?php endif; ?>
        </div>
        <?php
        $gallery_ids = $product->get_gallery_image_ids();
        if (!empty($gallery_ids)):
        ?>
        <div class="product-gallery__thumbs" role="list">
          <?php if ($thumb): ?>
          <button class="product-gallery__thumb active" data-img="<?php echo esc_url($thumb); ?>">
            <img src="<?php echo esc_url($thumb); ?>" alt="">
          </button>
          <?php endif; ?>
          <?php foreach ($gallery_ids as $img_id):
            $img_url = wp_get_attachment_image_url($img_id, 'hakastore-thumb');
            $img_full = wp_get_attachment_image_url($img_id, 'large');
          ?>
          <button class="product-gallery__thumb" data-img="<?php echo esc_url($img_full); ?>">
            <img src="<?php echo esc_url($img_url); ?>" alt="">
          </button>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>

      <!-- Product Info -->
      <div class="product-info">
        <div class="product-info__meta">
          <?php echo hakastore_product_type_badge(get_the_ID()); ?>
          <?php if ($product->get_average_rating() > 0): ?>
          <div class="product-info__rating">
            ⭐ <?php echo number_format($product->get_average_rating(),1); ?>
            <span class="product-info__reviews-count">(<?php echo $product->get_review_count(); ?> ulasan)</span>
          </div>
          <?php endif; ?>
          <div class="product-info__seller-link" style="display:inline-flex; align-items:center; gap:0.4rem; color:var(--color-gold); font-weight:700">
            <span style="background:var(--color-gold); color:#000; width:18px; height:18px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:10px">✓</span>
            <?php esc_html_e('HakaStore Official Store','hakastore'); ?>
          </div>
        </div>

        <h1 class="product-info__title"><?php the_title(); ?></h1>

        <div class="product-info__price-box">
          <div class="product-info__price" itemprop="price">
            <?php echo $product->get_price_html(); ?>
          </div>
          <?php if ($product->is_on_sale() && $product->get_regular_price()): ?>
          <div>
            <span class="product-info__price-orig">Rp <?php echo number_format((float)$product->get_regular_price(),0,',','.'); ?></span>
            <span class="product-info__discount-badge">
              -<?php echo round((1 - $product->get_sale_price()/$product->get_regular_price())*100); ?>%
            </span>
          </div>
          <?php endif; ?>
        </div>

        <!-- Add to cart -->
        <div class="product-info__buy-actions">
          <?php woocommerce_template_single_add_to_cart(); ?>
        </div>

        <!-- Product perks -->
        <div class="product-info__perks">
          <?php if ($product->is_virtual()): ?>
          <div class="product-perk">
            <div class="product-perk__icon">⚡</div>
            <span><?php esc_html_e('Unduh langsung setelah pembayaran terverifikasi','hakastore'); ?></span>
          </div>
          <div class="product-perk">
            <div class="product-perk__icon">♾️</div>
            <span><?php esc_html_e('Akses file seumur hidup & update gratis','hakastore'); ?></span>
          </div>
          <?php else: ?>
          <div class="product-perk">
            <div class="product-perk__icon">🚚</div>
            <span><?php esc_html_e('Pengiriman ke seluruh Indonesia dengan resi otomatis','hakastore'); ?></span>
          </div>
          <div class="product-perk">
            <div class="product-perk__icon">↩️</div>
            <span><?php esc_html_e('Garansi retur/tukar hingga 7 hari jika barang rusak','hakastore'); ?></span>
          </div>
          <?php endif; ?>
          <div class="product-perk">
            <div class="product-perk__icon">🔒</div>
            <span><?php esc_html_e('100% Produk Original resmi dari HakaStore','hakastore'); ?></span>
          </div>
        </div>

        <!-- Tabs -->
        <div class="product-tabs" id="product-tabs">
          <div class="tab-nav" role="tablist">
            <button class="tab-btn active" role="tab" aria-controls="tab-deskripsi" id="tabBtn-deskripsi">
              <?php esc_html_e('Deskripsi Produk','hakastore'); ?>
            </button>
            <button class="tab-btn" role="tab" aria-controls="tab-ulasan" id="tabBtn-ulasan">
              <?php esc_html_e('Ulasan Pembeli','hakastore'); ?> (<?php echo $product->get_review_count(); ?>)
            </button>
          </div>
          <div class="tab-panel active" id="tab-deskripsi" role="tabpanel">
            <div class="woocommerce-product-details__short-description" style="color:var(--color-text-muted);font-size:var(--text-sm);line-height:1.8">
              <?php the_content(); ?>
            </div>
          </div>
          <div class="tab-panel" id="tab-ulasan" role="tabpanel">
            <?php comments_template(); ?>
          </div>
        </div>

      </div>
    </div>

    <!-- Related products -->
    <?php
    $related_ids = wc_get_related_products(get_the_ID(), 4);
    if (!empty($related_ids)):
      $related = wc_get_products(['include'=>$related_ids,'limit'=>4]);
    ?>
    <div style="margin-top:4rem;padding-top:4rem;border-top:1px solid var(--color-border)">
      <h2 class="section-title" style="margin-bottom:2rem"><?php esc_html_e('Produk','hakastore'); ?> <em><?php esc_html_e('Rekomendasi Lainnya','hakastore'); ?></em></h2>
      <div class="products-grid products-grid--4col" style="grid-template-columns:repeat(4,1fr)">
        <?php foreach ($related as $rp):
          $pid = $rp->get_id();
          $rthumb = get_the_post_thumbnail_url($pid,'hakastore-card');
        ?>
        <article class="product-card">
          <div class="product-card__thumb">
            <?php if ($rthumb): ?>
              <img src="<?php echo esc_url($rthumb); ?>" alt="<?php echo esc_attr($rp->get_name()); ?>" loading="lazy">
            <?php else: ?>
              <div class="product-card__thumb-placeholder"><?php echo $rp->is_virtual() ? '💾' : '📦'; ?></div>
            <?php endif; ?>
            <div class="product-card__badge"><?php echo hakastore_product_type_badge($pid); ?></div>
          </div>
          <div class="product-card__body">
            <h3 class="product-card__name"><a href="<?php echo esc_url(get_permalink($pid)); ?>"><?php echo esc_html($rp->get_name()); ?></a></h3>
          </div>
          <div class="product-card__footer">
            <div class="product-card__price">
              <div class="product-card__price-current"><?php echo $rp->get_price_html(); ?></div>
            </div>
            <a href="<?php echo esc_url(get_permalink($pid)); ?>" class="product-card__add-btn"><?php esc_html_e('Lihat','hakastore'); ?></a>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>

    <?php endwhile; ?>
  </div>
</div>
<?php get_footer(); ?>
