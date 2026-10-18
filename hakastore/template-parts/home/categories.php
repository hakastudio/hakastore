<?php defined('ABSPATH') || exit; ?>
<section class="category-strip" id="kategori" aria-labelledby="cat-heading">
  <div class="container">
    <p class="category-strip__heading" id="cat-heading"><?php esc_html_e('Jelajahi Kategori','hakastore'); ?></p>
    <div class="category-strip__grid" role="list">
      <?php
      $categories = [
        [ 'icon' => '💻', 'name' => 'Software & Plugin',  'slug' => 'software-plugin'   ],
        [ 'icon' => '📚', 'name' => 'Ebook & PDF',        'slug' => 'ebook-pdf'         ],
        [ 'icon' => '🎓', 'name' => 'Kursus Online',      'slug' => 'kursus-online'     ],
        [ 'icon' => '🎨', 'name' => 'Desain & Template',  'slug' => 'desain-template'   ],
        [ 'icon' => '📷', 'name' => 'Foto & Video',       'slug' => 'foto-video'        ],
        [ 'icon' => '🛍️', 'name' => 'Fashion & Pakaian',  'slug' => 'fashion-pakaian'   ],
        [ 'icon' => '🏠', 'name' => 'Rumah & Dekorasi',   'slug' => 'rumah-dekorasi'    ],
        [ 'icon' => '📱', 'name' => 'Elektronik',         'slug' => 'elektronik'        ],
      ];
      foreach ( $categories as $cat ) :
        $term = get_term_by( 'slug', $cat['slug'], 'product_cat' );
        $url  = $term ? get_term_link( $term ) : get_term_link( $cat['slug'], 'product_cat' );
        $url  = is_wp_error( $url ) ? add_query_arg( 'product_cat', $cat['slug'], hakastore_get_shop_url() ) : $url;
      ?>
      <a href="<?php echo esc_url($url); ?>" class="category-chip reveal" role="listitem"
         aria-label="<?php echo esc_attr( sprintf(__('Kategori %s','hakastore'), $cat['name']) ); ?>">
        <span class="category-chip__icon" aria-hidden="true"><?php echo $cat['icon']; ?></span>
        <span class="category-chip__name"><?php echo esc_html($cat['name']); ?></span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
