<?php $headline = get_sub_field('title') ?>
<?php $first_text = get_sub_field('first_text') ?>
<?php $second_text = get_sub_field('second_text') ?>
<?php $cta = get_sub_field('cta') ?>
<?php $image = get_sub_field('project_image') ?>
<?php $media_position = get_sub_field('media_position') ?>
<?php $media_type = get_sub_field('media_type') ?>

<section class="text-media">
    <div class="text-media__content-container">
        <h2 class="text-media__content-headline">
            <?= $headline ?>
        </h2>

        <div class="text-media__content-text">
            <?= $first_text ?>
        </div>

        <?php if ($second_text || $second_text === 0): ?>
        <div class="text-media__content-text">
            <?= $second_text ?>
        </div>
        <?php endif; ?>

        <?php if ($cta || $cta === 0): ?>
        <a class="text-media__content-link"
           href="<?= $cta['url'] ?>"
           title="<?= $cta['title'] ?>">
            <?= $cta['title'] ?>
        </a>
        <?php endif; ?>

    </div>
    <div class="text-media__position text-media__position--<?= $media_position ?>">
        <img class="text-media__image"
             src="<?= $image['url'] ?>"
             alt="<?= $image['alt'] ?>"
             width="<?= $image['width'] ?>"
             height="<?= $image['height'] ?>">
    </div>
</section>
