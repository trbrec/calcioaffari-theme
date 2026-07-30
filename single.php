<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<article class="ca-single-article">
    <header class="ca-single-article__head">
        <div class="ca-shell ca-reading-width">
            <div class="ca-single-deal__meta"><span><?php echo esc_html(get_the_date('d F Y')); ?></span><span><?php echo esc_html((string) ca_theme_read_time()); ?> minuti</span></div>
            <h1><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?><p><?php echo esc_html(ca_theme_article_excerpt(get_the_excerpt())); ?></p><?php endif; ?>
        </div>
    </header>
    <?php if (has_post_thumbnail()) : ?>
        <div class="ca-shell ca-featured-image"><?php the_post_thumbnail('ca-hero'); ?></div>
    <?php endif; ?>
    <div class="ca-shell ca-reading-width ca-prose">
        <?php echo apply_filters('the_content', ca_theme_article_content(get_the_content())); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <?php
        $source_name = get_post_meta(get_the_ID(), 'ca_fonte_nome', true);
        $source_url = get_post_meta(get_the_ID(), 'ca_fonte_url', true);
        if ($source_name || $source_url) :
            ?>
            <aside class="ca-article-source">
                <span>Fonte originale</span>
                <?php if ($source_url) : ?>
                    <a href="<?php echo esc_url($source_url); ?>" target="_blank" rel="nofollow noopener noreferrer"><?php echo esc_html($source_name ?: wp_parse_url($source_url, PHP_URL_HOST)); ?> <b>↗</b></a>
                <?php else : ?>
                    <strong><?php echo esc_html($source_name); ?></strong>
                <?php endif; ?>
            </aside>
        <?php endif; ?>
    </div>
</article>
<?php endwhile; ?>
<?php get_footer(); ?>
