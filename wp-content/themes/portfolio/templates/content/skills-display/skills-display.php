<?php
$skills = get_sub_field('the_skill');
$cta = get_sub_field('cta');
?>


<section class="section skills">
    <div class="skills__container">
        <h2 class="skills__title"><?= esc_html(get_sub_field('title')) ?></h2>
        <div class="skills__card__container">
            <?php foreach ($skills as $skill) : ?>
            <div class="skills__card__divider">
                <article class="skills__card">
                    <h3 class="skills__card__title"><?= esc_html($skill['title']); ?></h3>
                    <p class="skills__card__content"><dfn><?= esc_html($skill['title']) . ' '?></dfn><?=esc_html($skill['description']);?></p>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if($cta['cta_above']) : ?>
            <p class="cta-above"><?= esc_html($cta['cta_above'])?></p>
        <?php endif; ?>

        <?php if($cta['cta_content'] && $cta['cta_link']) : ?>
            <a href="<?=esc_url($cta['cta_link']['url'])?>"
               title="<?=esc_attr($cta['cta_link']['title'])?>"
               target="<?=esc_attr($cta['cta_link']['target'])?>"
               class="cta cta--right skills__cta"><?= esc_html($cta['cta_content'])?></a>
        <?php endif; ?>
    </div>
</section>
