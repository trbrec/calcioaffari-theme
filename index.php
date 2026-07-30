<?php get_header(); ?>
<header class="ca-archive-head">
    <div class="ca-shell"><span class="ca-eyebrow">CalcioAffari</span><h1>Ultimi articoli</h1></div>
</header>
<div class="ca-shell ca-standard-archive">
    <?php if (have_posts()) : ?>
        <div class="ca-editorial-grid">
            <?php while (have_posts()) : the_post(); get_template_part('template-parts/content', 'card'); endwhile; ?>
        </div>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <div class="ca-empty-state"><span>CA</span><h2>La redazione sta preparando i primi contenuti.</h2></div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>

