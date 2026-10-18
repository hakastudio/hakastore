<?php
/**
 * HakaStore - Single Blog Post Template
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div style="padding: 4rem 0 6rem">
  <div class="container" style="max-width: 860px">
    <?php while ( have_posts() ) : the_post(); ?>
      <nav class="product-info__breadcrumb">
        <a href="<?php echo esc_url( home_url('/') ); ?>"><?php esc_html_e('Beranda', 'hakastore'); ?></a>
        <span aria-hidden="true">/</span>
        <a href="<?php echo esc_url( get_permalink( get_option('page_for_posts') ) ); ?>"><?php esc_html_e('Blog', 'hakastore'); ?></a>
        <span aria-hidden="true">/</span>
        <span aria-current="page"><?php the_title(); ?></span>
      </nav>

      <header style="margin-bottom: 2rem">
        <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:1rem">
          <span class="badge badge--gold"><?php echo get_the_category_list(', '); ?></span>
          <span style="font-size:var(--text-xs); color:var(--color-text-muted)"><?php echo get_the_date(); ?></span>
        </div>
        <h1 class="section-title" style="margin-bottom: 1.25rem"><?php the_title(); ?></h1>
        <div style="display:flex; align-items:center; gap:0.75rem">
          <div style="width:36px; height:36px; border-radius:var(--radius-full); background:var(--color-gold); color:#000; font-weight:700; display:flex; align-items:center; justify-content:center">
            <?php echo substr(get_the_author(), 0, 1); ?>
          </div>
          <div>
            <div style="font-size:var(--text-sm); font-weight:700; color:#FFF"><?php the_author(); ?></div>
            <div style="font-size:var(--text-xs); color:var(--color-text-muted)"><?php esc_html_e('Kontributor HakaStore', 'hakastore'); ?></div>
          </div>
        </div>
      </header>

      <?php if ( has_post_thumbnail() ) : ?>
        <div style="border-radius: var(--radius-xl); overflow: hidden; margin-bottom: 2.5rem; border: 1px solid var(--color-border)">
          <?php the_post_thumbnail('full'); ?>
        </div>
      <?php endif; ?>

      <article style="background: var(--color-surface-card); border: 1px solid var(--color-border); border-radius: var(--radius-xl); padding: 3rem; color: var(--color-text-secondary); line-height: 1.85; font-size: 1.05rem">
        <?php the_content(); ?>
      </article>

      <?php if ( comments_open() || get_comments_number() ) : ?>
        <div style="margin-top: 3rem">
          <?php comments_template(); ?>
        </div>
      <?php endif; ?>

    <?php endwhile; ?>
  </div>
</div>

<?php
get_footer();
