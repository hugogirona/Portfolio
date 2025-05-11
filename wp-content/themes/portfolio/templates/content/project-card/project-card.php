<article class="project-card">
    <a href="<?= esc_url(get_permalink()); ?>" class="project-card__link">

        <?php if (has_post_thumbnail()) : ?>
            <div class="project-card__image">
                <?= get_the_post_thumbnail(null, 'medium'); ?>
            </div>
        <?php endif; ?>

        <div class="project-card__content">
            <h3 class="project-card__title"><?= esc_html(get_the_title()); ?></h3>

            <?php if ($excerpt = get_the_excerpt()) : ?>
                <p class="project-card__excerpt"><?= esc_html($excerpt); ?></p>
            <?php endif; ?>
        </div>
    </a>
</article>
