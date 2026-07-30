<?php get_header(); ?>
<header class="ca-archive-head"><div class="ca-shell"><span class="ca-eyebrow">Ricerca</span><h1>Risultati per “<?php echo esc_html(get_search_query()); ?>”</h1></div></header>
<div class="ca-shell ca-standard-archive">
    <?php if (have_posts()) : ?>
        <div class="ca-editorial-grid">
            <?php while (have_posts()) : the_post(); get_template_part('template-parts/content', 'card'); endwhile; ?>
        </div>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <div class="ca-empty-state"><span>CA</span><h2>Nessun risultato</h2><p>Prova con il nome di un club, di un giocatore o di un campionato.</p><?php get_search_form(); ?></div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>

