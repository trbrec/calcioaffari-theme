<?php
get_header();
$title = is_tax() ? single_term_title('', false) : 'Tutti gli affari';
$description = is_tax() ? term_description() : 'Operazioni, rinnovi, prestiti e trattative pubblicati con stato e fonte riconoscibili.';
?>
<header class="ca-archive-head">
    <div class="ca-shell">
        <span class="ca-eyebrow">Database mercato</span>
        <h1><?php echo esc_html($title); ?></h1>
        <?php if ($description) : ?><div class="ca-archive-head__description"><?php echo wp_kses_post($description); ?></div><?php endif; ?>
        <div class="ca-filter-links">
            <a href="<?php echo esc_url(ca_theme_archive_url('ca_affare')); ?>">Tutti</a>
            <a href="<?php echo esc_url(ca_theme_term_url('ca_campionato', 'serie-a')); ?>">Serie A</a>
            <a href="<?php echo esc_url(ca_theme_term_url('ca_campionato', 'serie-b')); ?>">Serie B</a>
            <a href="<?php echo esc_url(ca_theme_term_url('ca_campionato', 'serie-c')); ?>">Serie C</a>
            <a href="<?php echo esc_url(ca_theme_term_url('ca_campionato', 'serie-d')); ?>">Serie D</a>
        </div>
    </div>
</header>
<div class="ca-shell ca-archive-layout">
    <section class="ca-deal-grid">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'affare'); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="ca-empty-state">
                <span>CA</span>
                <h2>Nessun affare pubblicato</h2>
                <p>Questa sezione si popola soltanto con informazioni verificate e classificate dalla redazione.</p>
            </div>
        <?php endif; ?>
    </section>
    <?php the_posts_pagination(array('mid_size' => 1, 'prev_text' => '← Precedenti', 'next_text' => 'Successivi →')); ?>
</div>
<?php get_footer(); ?>

