<article class="project-card" itemscope itemtype="https://schema.org/CreativeWork">
    <a href="<?= esc_url(get_permalink()); ?>" class="project-card__link" title="<?= __hepl("Vers mon projet ") . esc_attr(get_the_title()); ?>"></a>
    <?php if (has_post_thumbnail()) : ?>
        <figure class="project-card__fig" itemprop="thumbnail">
            <?= get_the_post_thumbnail(null, 'medium'); ?>
        </figure>
    <?php endif; ?>

    <div class="project-card__content">
        <h3 class="project-card__title" itemprop="headline"><?= esc_html(get_the_title()); ?></h3>

        <?php if ($excerpt = get_the_excerpt()) : ?>
            <p class="project-card__excerpt" itemprop="description"><?= esc_html($excerpt); ?></p>
        <?php endif; ?>
    </div>
</article>
