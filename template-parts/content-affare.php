<?php
$post_id = get_the_ID();
$official = get_post_meta($post_id, 'ca_ufficiale', true) === '1';
$from = get_post_meta($post_id, 'ca_club_partenza', true);
$to = get_post_meta($post_id, 'ca_club_arrivo', true);
$formula = get_post_meta($post_id, 'ca_formula', true);
$championships = get_the_terms($post_id, 'ca_campionato');
?>
<article <?php post_class('ca-deal-card'); ?>>
    <div class="ca-deal-card__top">
        <span class="ca-status <?php echo $official ? 'is-official' : ''; ?>"><i></i><?php echo $official ? 'Ufficiale' : 'Aggiornamento'; ?></span>
        <?php if ($championships && !is_wp_error($championships)) : ?>
            <a href="<?php echo esc_url(get_term_link($championships[0])); ?>"><?php echo esc_html($championships[0]->name); ?></a>
        <?php endif; ?>
    </div>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php if ($from || $to) : ?>
        <div class="ca-deal-route">
            <span><small>Da</small><strong><?php echo esc_html($from ?: '—'); ?></strong></span>
            <b>→</b>
            <span><small>A</small><strong><?php echo esc_html($to ?: '—'); ?></strong></span>
        </div>
    <?php endif; ?>
    <div class="ca-deal-card__foot">
        <span><?php echo esc_html($formula ?: 'Formula da definire'); ?></span>
        <a href="<?php the_permalink(); ?>">Scheda completa →</a>
    </div>
</article>

