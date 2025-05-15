<?php

get_header(); ?>

    <section class="section hero">
        <svg xmlns="http://www.w3.org/2000/svg" width="135" height="135" viewBox="0 0 135 135" fill="none" class="hero__svg--sun">
            <g filter="url(#filter0_f_503_805)">
                <ellipse cx="67.5" cy="67.5" rx="47" ry="47" transform="rotate(180 67.5 67.5)" fill="url(#paint0_linear_503_805)"/>
            </g>
            <defs>
                <filter id="filter0_f_503_805" x="0.5" y="0.5" width="134" height="134" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                    <feGaussianBlur stdDeviation="10" result="effect1_foregroundBlur_503_805"/>
                </filter>
                <linearGradient id="paint0_linear_503_805" x1="67.5" y1="20.5" x2="67.5" y2="114.5" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#AFAD96"/>
                    <stop offset="0.576923" stop-color="#F29337"/>
                    <stop offset="0.75" stop-color="#ED772F"/>
                    <stop offset="1" stop-color="#ED642D"/>
                </linearGradient>
            </defs>
        </svg>


            <h2 class="hero__title">
                <i class="hero__title--first"><?= get_field('first_title') ?> </i>
                <i class="hero__title--second"><?= get_field('second_title') ?></i>
            </h2>

        <div class="hero__name__container">
            <p class="hero__name"><?= get_field('my_name') ?></p>
        </div>

        <div class="hero__quote__container">
            <p class="hero__quote"><?= get_field('hero_quote') ?></p>
        </div>

        <?php $first_cta = get_field('first_cta'); ?>
        <a class="cta hero__cta"
           href="<?=esc_url($first_cta['cta_link']['url'])?>"
           title="<?=esc_attr($first_cta['cta_link']['title'])?>"
           target="<?=esc_attr($first_cta['cta_link']['target'])?>"><?=esc_html($first_cta['cta_text'])?></a>
    </section>

    <section class="section projects">
        <div class="projects__container">
            <h2 class="projects__title">
                <i class="projects__title--first">
                <?= __hepl('Mes derniers ')?>
                </i>
                <i class="projects__title--second">
                    <?= __hepl('projets')?>
                </i>
            </h2>

            <div class="projects__grid">
                <?php
                $projets = new WP_Query([
                    'post_type' => 'project',
                    'posts_per_page' => 3,
                    'orderby' => 'rand'
                ]);

                if ($projets->have_posts()) :
                    while ($projets->have_posts()) : $projets->the_post();
                        include 'templates/content/project-card/project-card.php';
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Aucun projet trouvé.</p>';
                endif;
                ?>
                <?php $second_cta = get_field('second_cta'); ?>
                    <a class="cta projects__cta--home"
                       href="<?=$second_cta['cta_link']['url']?>"
                       title="<?=$second_cta['cta_link']['title']?>"
                       target="<?=$second_cta['cta_link']['target']?>"><?=$second_cta['cta_text']?></a>
            </div>
        </div>
    </section>

<?php
get_footer();
