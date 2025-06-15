<?php

get_header(); ?>


<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if (have_posts()): while (have_posts()): the_post(); ?>

    <section class=" section single-project">
        <h2 class="single-project__title"><?php the_field('project_title'); ?></h2>
        <div class="single-project__divider">
            <?php include 'templates/content/flexible.php' ?>
        </div>
    </section>
<?php
    // On ferme "la boucle" (The Loop):
endwhile;
else: ?>
    <p>Ce projet n'existe pas.</p>
<?php endif; ?>

    <section class="section projects">
        <div class="projects__container">
            <h2 class="projects__title">
                <i class="projects__title--first">
                    <?= __hepl('Quelques autres') ?>
                </i>
                <i class="projects__title--second">
                    <?= __hepl('projets') ?>
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
            </div>
            <?php if(get_field('cta')) :?>
            <?php
                $cta = get_field('cta');
                $label = $cta['cta_content'];
                $link = $cta['cta_link'];
            ?>


                <a href="<?=esc_url($link['url'])?>"
                   title="<?=esc_attr($link['title'])?>"
                   target="<?=esc_attr($link['target'] ? : '_self')?>"
                   class="cta cta--right projects__cta--single"><?= esc_html($label)?>
                </a>
            <?php endif; ?>
        </div>

    </section>


<?php
get_footer();
