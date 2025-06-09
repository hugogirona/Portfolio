<?php $headline = get_sub_field('title') ?>
<?php $first_text = get_sub_field('first_text') ?>
<?php $second_text = get_sub_field('second_text') ?>
<?php $ctas = get_sub_field('cta') ?>
<?php $image = get_sub_field('project_image') ?>
<?php $media_position = get_sub_field('media_position') ?>
<?php $media_type = get_sub_field('media_type') ?>


<article class="text-media">
    <div class="text-media__divider">

        <h3 class="text-media__headline">
            <?= $headline ?>
        </h3>

        <div class="text-media__content">


            <?php if ($first_text || $first_text === 0): ?>
                <p class="text-media__content__text">
                    <?= $first_text ?>
                </p>
            <?php endif; ?>



            <?php if ($second_text || $second_text === 0): ?>
                <p class="text-media__content__text">
                    <?= $second_text ?>
                </p>
            <?php endif; ?>
        </div>


        <?php if ($ctas): ?>
            <div class="text-media__cta-divider">
                <?php foreach ($ctas as $cta): ?>
                <a class="text-media__link"
                   href="<?= esc_url($cta['link']['url']) ?>"
                   title="<?= esc_attr($cta['link']['title']) ?>"
                   target="<?= esc_attr($cta['link']['target'] ? : '_self') ?>">
                    <?= esc_html($cta['label']) ?>
                </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="text-media__position text-media__position--<?= $media_position ?>">
        <img class="text-media__image"
             src="<?= $image['url'] ?>"
             alt="<?= $image['alt'] ?>"
             width="<?= $image['width'] ?>"
             height="<?= $image['height'] ?>">
    </div>
</article>
