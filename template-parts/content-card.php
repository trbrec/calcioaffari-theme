<article <?php post_class('ca-article-card'); ?>>
    <a class="ca-article-card__media" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('ca-card', array('loading' => 'lazy')); ?>
        <?php else : ?>
            <span class="ca-article-card__placeholder"><i>CA</i><b>Analisi</b></span>
        <?php endif; ?>
    </a>
    <div class="ca-article-card__body">
        <div class="ca-article-card__meta">
            <span><?php echo esc_html(get_the_date('d M Y')); ?></span>
            <span><?php echo esc_html((string) ca_theme_read_time()); ?> min</span>
        </div>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php echo esc_html(get_the_excerpt()); ?></p>
        <a class="ca-card-link" href="<?php the_permalink(); ?>">Leggi <span>→</span></a>
    </div>
</article>

