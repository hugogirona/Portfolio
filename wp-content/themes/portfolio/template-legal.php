<?php /* Template Name: Page "Mentions légales" */ ?>
<?php get_header(); ?>

<?php if (have_rows('flexible_content')):
while (have_rows('flexible_content')):the_row();
if (get_row_layout() === 'title-paragraph'): ?>

<?php
$title = get_sub_field('section_title');
$paragraphs = get_sub_field('the_paragraph');
?>

<section class="section legal">
    <div class="legal__container">
        <h2 class="legal__title"><?= __hepl('Mentions légales') ?></h2>
        <div class="title-paragraph__container">
            <?php foreach ($paragraphs as $paragraph) : ?>
                <article class="title-paragraph title-paragraph--<?= $paragraph['position']?>">
                    <?php if ($paragraph['title']): ?>
                        <h3 class="title-paragraph__title"><?= esc_html($paragraph['title']); ?></h3>
                    <?php endif; ?>
                    <?php if ($paragraph['text']): ?>
                        <p class="title-paragraph__content"><?= esc_html($paragraph['text']); ?></p>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

</section>

<?php endif;
endwhile;
endif; ?>

<?php get_footer(); ?>

