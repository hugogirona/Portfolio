<?php
$paragraphs_list = get_sub_field('the_paragraph');
?>


<section class="section paragraphs-list">
    <div class="paragraphs-list__container">
        <h2 class="paragraphs-list__title"><?= esc_html(get_sub_field('title')); ?></h2>
        <div class="paragraph__container">
            <?php foreach ($paragraphs_list as $paragraph) : ?>
                <article class="paragraph">
                    <h3 class="paragraph__title"><?= esc_html($paragraph['title']); ?></h3>
                    <p class="paragraph__content"><?= esc_html($paragraph['text']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

</section>
