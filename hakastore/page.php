<?php
/**
 * HakaStore - Standard Page Template
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div style="padding: 4rem 0 6rem">
  <div class="container" style="max-width: 900px">
    <?php while ( have_posts() ) : the_post(); ?>
      <header style="margin-bottom: 2.5rem; text-align: center">
        <h1 class="section-title" style="margin-bottom: 1rem"><?php the_title(); ?></h1>
        <div style="width: 60px; height: 3px; background: var(--color-gold); margin: 0 auto"></div>
      </header>

      <?php if ( has_post_thumbnail() ) : ?>
        <div style="border-radius: var(--radius-xl); overflow: hidden; margin-bottom: 2.5rem; border: 1px solid var(--color-border)">
          <?php the_post_thumbnail('full'); ?>
        </div>
      <?php endif; ?>

      <article style="background: var(--color-surface-card); border: 1px solid var(--color-border); border-radius: var(--radius-xl); padding: 3rem; color: var(--color-text-secondary); line-height: 1.8; font-size: var(--text-base)">
        <?php the_content(); ?>
      </article>
    <?php endwhile; ?>
  </div>
</div>

<?php
get_footer();
