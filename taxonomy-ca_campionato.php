<?php
get_header();
$term = get_queried_object();
$is_team = is_tax('ca_squadra');
$title = $term && isset($term->name) ? $term->name : single_term_title('', false);
$term_slug = $term && isset($term->slug) ? $term->slug : '';
$competition = $is_team ? array($title, 'fifa.com', 'Notizie, risultati e mercato: tutti gli aggiornamenti dedicati alla squadra.') : ca_theme_competition_data($term_slug);
$is_direct_logo = strpos($competition[1], 'upload.wikimedia.org') !== false;
$logo_url = $is_direct_logo ? 'https://' . $competition[1] : 'https://www.google.com/s2/favicons?domain=' . $competition[1] . '&sz=256';
?>
<header class="ca-archive-head ca-archive-head--news">
    <div class="ca-shell ca-archive-head__brand">
        <div class="ca-archive-head__logo"><img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr('Logo ' . $competition[0]); ?>" width="110" height="110"></div>
        <div>
            <span class="ca-eyebrow"><?php echo esc_html($is_team ? 'Notizie per squadra' : 'Campionato e competizioni'); ?></span>
            <h1><?php echo esc_html($title); ?></h1>
            <div class="ca-archive-head__description">
            <?php if (term_description()) : ?>
                <?php echo wp_kses_post(term_description()); ?>
            <?php else : ?>
                <p><?php echo esc_html($competition[2]); ?></p>
            <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<div class="ca-shell ca-news-archive">
    <?php if (have_posts()) : ?>
        <div class="ca-news-archive__list">
            <?php $archive_number = 0; ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $archive_number++;
                $source_name = get_post_meta(get_the_ID(), 'ca_fonte_nome', true);
                ?>
                <article class="ca-latest-item ca-latest-item--archive">
                    <span class="ca-latest-item__number"><?php echo esc_html(str_pad((string) $archive_number, 2, '0', STR_PAD_LEFT)); ?></span>
                    <div class="ca-latest-item__body">
                        <div class="ca-latest-item__meta">
                            <span><?php echo esc_html(ca_theme_news_label()); ?></span>
                            <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date('d/m/Y · H:i')); ?></time>
                            <?php if ($source_name) : ?><span>Fonte: <?php echo esc_html($source_name); ?></span><?php endif; ?>
                        </div>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </div>
                    <a class="ca-latest-item__open" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr('Apri: ' . get_the_title()); ?>">→</a>
                </article>
            <?php endwhile; ?>
        </div>
        <?php the_posts_pagination(array('mid_size' => 1, 'prev_text' => '← Precedenti', 'next_text' => 'Successivi →')); ?>
    <?php else : ?>
        <div class="ca-empty-state">
            <span>CA</span>
            <h2>Nessuna notizia pubblicata</h2>
            <p>La pagina è pronta e verrà popolata con i prossimi aggiornamenti verificati.</p>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
