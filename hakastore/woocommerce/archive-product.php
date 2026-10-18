<?php
/**
 * HakaStore - Shop & Catalog Archive (Official Store)
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="shop-layout">
  <div class="container">

    <!-- Breadcrumb & Header -->
    <div class="shop-header">
      <nav class="product-info__breadcrumb">
        <a href="<?php echo esc_url( home_url('/') ); ?>"><?php esc_html_e('Beranda', 'hakastore'); ?></a>
        <span aria-hidden="true">/</span>
        <span aria-current="page"><?php woocommerce_page_title(); ?></span>
      </nav>

      <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:1.5rem">
        <div>
          <h1 class="section-title">
            <?php woocommerce_page_title(); ?>
          </h1>
          <p class="section-subtitle">
            <?php esc_html_e('Katalog produk resmi HakaStore. Jaminan produk original dengan transaksi aman.', 'hakastore'); ?>
          </p>
        </div>

        <!-- Filter Pill for Digital vs Physical -->
        <div style="display:flex; gap:0.5rem; background:var(--color-surface); padding:0.35rem; border-radius:var(--radius-full); border:1px solid var(--color-border)">
          <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" 
             class="btn btn--sm <?php echo !isset($_GET['filter_type']) ? 'btn--primary' : 'btn--ghost'; ?>" 
             style="border-radius:var(--radius-full); border:none">
            <?php esc_html_e('Semua Produk', 'hakastore'); ?>
          </a>
          <a href="<?php echo esc_url( add_query_arg('filter_type', 'digital', wc_get_page_permalink('shop')) ); ?>" 
             class="btn btn--sm <?php echo (isset($_GET['filter_type']) && $_GET['filter_type'] === 'digital') ? 'btn--primary' : 'btn--ghost'; ?>" 
             style="border-radius:var(--radius-full); border:none">
            ⚡ <?php esc_html_e('Produk Digital', 'hakastore'); ?>
          </a>
          <a href="<?php echo esc_url( add_query_arg('filter_type', 'physical', wc_get_page_permalink('shop')) ); ?>" 
             class="btn btn--sm <?php echo (isset($_GET['filter_type']) && $_GET['filter_type'] === 'physical') ? 'btn--primary' : 'btn--ghost'; ?>" 
             style="border-radius:var(--radius-full); border:none">
            📦 <?php esc_html_e('Produk Fisik', 'hakastore'); ?>
          </a>
        </div>
      </div>
    </div>

    <div class="shop-container">

      <!-- Sidebar Filters -->
      <aside class="shop-sidebar">
        <!-- Categories widget -->
        <div class="sidebar-widget">
          <h3 class="sidebar-widget__title"><?php esc_html_e('Kategori Produk', 'hakastore'); ?></h3>
          <ul class="widget-list">
            <?php
            $cat_terms = get_terms([
              'taxonomy'   => 'product_cat',
              'hide_empty' => false,
            ]);
            if ( ! empty($cat_terms) && ! is_wp_error($cat_terms) ) :
              foreach ( $cat_terms as $term ) :
                if ( $term->slug === 'uncategorized' ) continue;
            ?>
              <li class="widget-list__item">
                <a href="<?php echo esc_url( get_term_link($term) ); ?>">
                  <span><?php echo esc_html( $term->name ); ?></span>
                  <span class="widget-list__count"><?php echo $term->count; ?></span>
                </a>
              </li>
            <?php
              endforeach;
            endif;
            ?>
          </ul>
        </div>

        <!-- Filter by Price -->
        <div class="sidebar-widget">
          <h3 class="sidebar-widget__title"><?php esc_html_e('Rentang Harga', 'hakastore'); ?></h3>
          <ul class="widget-list">
            <li class="widget-list__item"><a href="<?php echo esc_url( add_query_arg(['min_price'=>0, 'max_price'=>50000]) ); ?>">&lt; Rp 50.000</a></li>
            <li class="widget-list__item"><a href="<?php echo esc_url( add_query_arg(['min_price'=>50000, 'max_price'=>150000]) ); ?>">Rp 50.000 - Rp 150.000</a></li>
            <li class="widget-list__item"><a href="<?php echo esc_url( add_query_arg(['min_price'=>150000, 'max_price'=>500000]) ); ?>">Rp 150.000 - Rp 500.000</a></li>
            <li class="widget-list__item"><a href="<?php echo esc_url( add_query_arg(['min_price'=>500000]) ); ?>">&gt; Rp 500.000</a></li>
          </ul>
        </div>

        <!-- Official Store Guarantee -->
        <div class="sidebar-widget" style="background:linear-gradient(135deg, rgba(212,175,55,0.08) 0%, rgba(20,20,32,0.95) 100%); border-color:var(--color-border-gold)">
          <div style="font-size:1.75rem; margin-bottom:0.75rem">🛡️</div>
          <h4 style="font-size:var(--text-sm); font-weight:700; color:var(--color-gold); margin-bottom:0.5rem">
            <?php esc_html_e('HakaStore Official', 'hakastore'); ?>
          </h4>
          <p style="font-size:var(--text-xs); color:var(--color-text-secondary); line-height:1.6">
            <?php esc_html_e('Semua produk dikurasi langsung oleh kami. Garansi file digital valid seumur hidup & garansi retur produk fisik.', 'hakastore'); ?>
          </p>
        </div>
      </aside>

      <!-- Main Shop Content -->
      <main class="shop-main">
        <div class="shop-toolbar">
          <div class="shop-toolbar__count">
            <?php if ( function_exists('woocommerce_result_count') ) woocommerce_result_count(); ?>
          </div>
          <div class="shop-toolbar__sort">
            <?php if ( function_exists('woocommerce_catalog_ordering') ) woocommerce_catalog_ordering(); ?>
          </div>
        </div>

        <?php if ( have_posts() ) : ?>
          <div class="products-grid products-grid--3col" style="grid-template-columns:repeat(3, 1fr)">
            <?php while ( have_posts() ) : the_post();
              global $product;
              $pid = get_the_ID();
              $product = wc_get_product( $pid );
              if ( ! $product ) continue;
              $thumb = get_the_post_thumbnail_url( $pid, 'hakastore-card' );
              $rating = $product->get_average_rating();
              $reviews = $product->get_review_count();
            ?>
              <article class="product-card" aria-labelledby="p-<?php echo $pid; ?>">
                <div class="product-card__thumb">
                  <?php if ( $thumb ) : ?>
                    <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy">
                  <?php else : ?>
                    <div class="product-card__thumb-placeholder" aria-hidden="true">
                      <?php echo $product->is_virtual() ? '💾' : '📦'; ?>
                    </div>
                  <?php endif; ?>

                  <div class="product-card__badge">
                    <?php echo hakastore_product_type_badge( $pid ); ?>
                  </div>
                </div>

                <div class="product-card__body">
                  <div class="product-card__seller">
                    <div class="product-card__seller-avatar" style="background:var(--color-gold); color:#000">H</div>
                    <span><?php esc_html_e('HakaStore Official', 'hakastore'); ?></span>
                  </div>
                  <h3 class="product-card__name" id="p-<?php echo $pid; ?>">
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
                  </h3>
                  <?php if ( $reviews > 0 ) : ?>
                    <div class="product-card__meta">
                      <span class="product-card__rating">⭐ <?php echo number_format($rating, 1); ?></span>
                      <span>(<?php echo $reviews; ?> ulasan)</span>
                    </div>
                  <?php endif; ?>
                </div>

                <div class="product-card__footer">
                  <div class="product-card__price">
                    <div class="product-card__price-current"><?php echo $product->get_price_html(); ?></div>
                  </div>
                  <?php if ( $product->is_purchasable() && $product->is_in_stock() ) : ?>
                    <button class="product-card__add-btn add-to-cart-btn" data-product-id="<?php echo $pid; ?>">
                      <?php esc_html_e('Beli', 'hakastore'); ?>
                    </button>
                  <?php else : ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="product-card__add-btn">
                      <?php esc_html_e('Lihat', 'hakastore'); ?>
                    </a>
                  <?php endif; ?>
                </div>
              </article>
            <?php endwhile; ?>
          </div>

          <div class="pagination">
            <?php echo paginate_links(['prev_text' => '&larr;', 'next_text' => '&rarr;']); ?>
          </div>
        <?php else : ?>
          <div style="background:var(--color-surface-card); border:1px solid var(--color-border); border-radius:var(--radius-xl); padding:4rem 2rem; text-align:center">
            <div style="font-size:3.5rem; margin-bottom:1rem">🔍</div>
            <h3 style="font-size:1.5rem; margin-bottom:0.75rem"><?php esc_html_e('Tidak ada produk yang cocok', 'hakastore'); ?></h3>
            <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="btn btn--primary">
              <?php esc_html_e('Reset Filter', 'hakastore'); ?>
            </a>
          </div>
        <?php endif; ?>
      </main>

    </div>
  </div>
</div>

<?php
get_footer();
