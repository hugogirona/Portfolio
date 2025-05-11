<?php

get_header(); ?>

    <section class="section hero">
        <h2 class="hero__title"><i><?= get_field('first_title') ?> </i><?= get_field('second_title') ?></h2>
        <p class="hero__name"><?= get_field('my_name') ?></p>
        <p class="hero__quote"><?= get_field('hero_quote') ?></p>
        <?php $first_cta = get_field('first_cta'); ?>
        <a class="cta hero__cta"
           href="<?=esc_url($first_cta['cta_link']['url'])?>"
           title="<?=esc_attr($first_cta['cta_link']['title'])?>"
           target="<?=esc_attr($first_cta['cta_link']['target'])?>"><?=esc_html($first_cta['cta_text'])?></a>
    </section>

    <section class="section home-projects">
        <div class="home-projects__container">
            <h2 class="home-projects__title">
                <?= __hepl('Mes derniers projets')?>
            </h2>

            <div class="home-projects__grid">
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
            </div>
            <?php $second_cta = get_field('second_cta'); ?>
            <a class="cta home-project__cta"
               href="<?=$second_cta['cta_link']['url']?>"
               title="<?=$second_cta['cta_link']['title']?>"
               target="<?=$second_cta['cta_link']['target']?>"><?=$second_cta['cta_text']?></a>
        </div>
    </section>

<?php
get_footer();
