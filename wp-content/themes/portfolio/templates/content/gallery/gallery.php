<?php
$title = get_sub_field('gallery_title');
$images = get_sub_field('gallery');
?>

<?php if ($images) : ?>
    <section class="gallery">
        <div class="container">
            <?php if ($title) : ?>
                <h2 class="gallery__title"><?= esc_html($title); ?></h2>
            <?php endif; ?>

            <div class="gallery__grid">
                <?php foreach ($images as $image) : ?>
                    <figure class="gallery__item">
                        <img src="<?= esc_url($image['sizes']['large']); ?>"
                             alt="<?= esc_attr($image['alt']); ?>"
                             width="<?= esc_attr($image['width']); ?>"
                             height="<?= esc_attr($image['height']); ?>">
                        <?php if (!empty($image['caption'])) : ?>
                            <figcaption class="gallery__caption"><?= esc_html($image['caption']); ?></figcaption>
                        <?php endif; ?>
                    </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>