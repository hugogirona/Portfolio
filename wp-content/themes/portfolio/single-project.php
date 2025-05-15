<?php

get_header(); ?>


<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if (have_posts()): while (have_posts()): the_post(); ?>

    <section class="single_project__header">
        <h2 class="single_project__title"><?php the_field('project_title'); ?></h2>
        <div>
            <?php include 'templates/content/flexible.php' ?>
        </div>
    </section>
<?php
    // On ferme "la boucle" (The Loop):
endwhile;
else: ?>
    <p>Ce projet n'existe pas.</p>
<?php endif; ?>

    <section class="section other-projects">
        <div class="other-projects__container">
            <h2 class="other-projects__title">
                <?= __hepl('Mes derniers projets') ?>
            </h2>

            <div class="other-projects__grid">
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
            <?php if(get_field('cta_link') && get_field('cta_content')) :?>
                <a href="<?=esc_url(get_field('cta_link')['url'])?>"
                   title="<?=esc_attr(get_field('cta_link')['title'])?>"
                   target="<?=esc_attr(get_field('cta_link')['target'])?>"
                   class="cta skills_cta"><?= esc_html(get_field('cta_content'))?></a>
            <?php endif; ?>
        </div>
    </section>


<?php
get_footer();
