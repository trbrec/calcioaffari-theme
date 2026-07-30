<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<article class="ca-page">
    <header class="ca-page__head"><div class="ca-shell ca-reading-width"><span class="ca-eyebrow">CalcioAffari</span><h1><?php the_title(); ?></h1></div></header>
    <div class="ca-shell ca-reading-width ca-prose"><?php the_content(); ?></div>
</article>
<?php endwhile; ?>
<?php get_footer(); ?>

