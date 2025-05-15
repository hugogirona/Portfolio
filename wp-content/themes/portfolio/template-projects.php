<?php /* Template Name: Page "Projects" */ ?>
<?php get_header(); ?>

<section class="section projects">
    <div class="projects__container">
        <h2 class="projects__title">
            <?= __hepl('Projets')?>
        </h2>


        <div class="projects__grid">
            <?php
            $projets = new WP_Query([
                'post_type' => 'project',
                'posts_per_page' => -1,
                'orderby' => 'desc'
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
               class="cta projects_cta"><?= esc_html(get_field('cta_content'))?></a>
        <?php endif; ?>
    </div>

</section>

<?php get_footer(); ?>
