<?php
$title = get_sub_field('section_title');
$paragraphs = get_sub_field('the_paragraph');
?>

<section class="section presentation">
    <div class="presentation__container">
        <h2 class="presentation__title "><?= __hepl('À propos')?></h2>
        <div class="title-paragraph__container">
            <?php foreach ($paragraphs as $paragraph) : ?>
                <article class="title-paragraph">
                    <?php if ($paragraph['title']):?>
                    <h3 class="title-paragraph__title"><?= esc_html($paragraph['title']); ?></h3>
                    <?php endif; ?>
                    <?php if ($paragraph['text']):?>
                    <p class="title-paragraph__content"><?= esc_html($paragraph['text']); ?></p>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

</section>
