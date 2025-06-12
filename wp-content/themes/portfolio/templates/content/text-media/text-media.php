<?php $headline = get_sub_field('title') ?>
<?php $first_text = get_sub_field('first_text') ?>
<?php $second_text = get_sub_field('second_text') ?>
<?php $ctas = get_sub_field('cta') ?>
<?php $image = get_sub_field('project_image') ?>
<?php $media_position = get_sub_field('media_position') ?>
<?php $media_type = get_sub_field('media_type') ?>


<article class="text-media">
    <div class="text-media__divider">
        <?php if ($headline): ?>
            <h3 class="text-media__headline"><?= esc_html($headline) ?></h3>
        <?php endif; ?>

        <div class="text-media__content">
            <?php if ($first_text || $first_text === 0): ?>
                <p class="text-media__content__text"><?= $first_text ?></p>
            <?php endif; ?>

            <?php if ($second_text || $second_text === 0): ?>
                <p class="text-media__content__text"><?= $second_text ?></p>
            <?php endif; ?>
        </div>

        <?php if ($ctas): ?>
            <div class="text-media__cta-divider">
                <?php foreach ($ctas as $cta): ?>
                    <a class="text-media__link"
                       href="<?= esc_url($cta['link']['url']) ?>"
                       title="<?= esc_attr($cta['link']['title']) ?>"
                       target="<?= esc_attr($cta['link']['target'] ?: '_self') ?>">
                        <?= esc_html($cta['label']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($image): ?>
        <div class="text-media__position text-media__position--<?= esc_attr($media_position) ?>">
            <?php
            $image_url = $image['url'];
            $webp_src = preg_replace('/\.(jpe?g|png)$/i', '.webp', $image_url);
            $webp_path = str_replace(home_url('/'), ABSPATH, $webp_src);
            $has_webp = file_exists($webp_path);
            ?>
            <picture>
                <?php if ($has_webp): ?>
                    <source srcset="<?= esc_url($webp_src) ?>" type="image/webp">
                <?php endif; ?>
                <img class="text-media__image"
                     src="<?= esc_url($image_url) ?>"
                     alt="<?= esc_attr($image['alt']) ?>"
                     width="<?= esc_attr($image['width']) ?>"
                     height="<?= esc_attr($image['height']) ?>">
            </picture>
        </div>
    <?php endif; ?>
</article>