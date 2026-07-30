<?php get_header(); ?>
<header class="ca-archive-head">
    <div class="ca-shell">
        <span class="ca-eyebrow">Archivio</span>
        <h1><?php the_archive_title(); ?></h1>
        <div class="ca-archive-head__description"><?php the_archive_description(); ?></div>
    </div>
</header>
<div class="ca-shell ca-standard-archive">
    <?php if (have_posts()) : ?>
        <div class="ca-editorial-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'card'); ?>
            <?php endwhile; ?>
        </div>
        <?php the_posts_pagination(array('mid_size' => 1)); ?>
    <?php else : ?>
        <div class="ca-empty-state"><span>CA</span><h2>Nessun contenuto disponibile</h2></div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>

