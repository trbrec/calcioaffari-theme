<?php
/*
Template Name: Fantamercato
*/
get_header();
$fantasy_news = new WP_Query(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 12,
    'category_name' => 'fantamercato',
    'orderby' => 'date',
    'order' => 'DESC',
));
?>
<header class="ca-archive-head ca-archive-head--news">
    <div class="ca-shell ca-archive-head__brand">
        <div class="ca-archive-head__logo ca-archive-head__logo--fantasy">F</div>
        <div>
            <span class="ca-eyebrow">Fantacalcio e strategie</span>
            <h1>Fantamercato</h1>
            <div class="ca-archive-head__description"><p>Consigli, quotazioni, possibili titolari, occasioni e rischi per costruire la rosa e gestire gli scambi.</p></div>
        </div>
    </div>
</header>
<div class="ca-shell ca-news-archive">
<?php if ($fantasy_news->have_posts()) : ?><div class="ca-news-archive__list">
<?php $i = 0; while ($fantasy_news->have_posts()) : $fantasy_news->the_post(); $i++; ?>
<article class="ca-latest-item ca-latest-item--archive"><span class="ca-latest-item__number"><?php echo esc_html(str_pad((string) $i, 2, '0', STR_PAD_LEFT)); ?></span><div class="ca-latest-item__body"><div class="ca-latest-item__meta"><span>Fantamercato</span><time><?php echo esc_html(get_the_date('d/m/Y · H:i')); ?></time></div><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><p><?php echo esc_html(get_the_excerpt()); ?></p></div><a class="ca-latest-item__open" href="<?php the_permalink(); ?>">→</a></article>
<?php endwhile; ?></div>
<?php else : ?><div class="ca-empty-state"><span>F</span><h2>La sezione Fantamercato è pronta</h2><p>Qui entreranno solo consigli e aggiornamenti utili per il fantacalcio, separati dalle notizie di mercato reali.</p></div><?php endif; wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>
