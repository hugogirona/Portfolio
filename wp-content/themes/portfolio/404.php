<?php get_header(); ?>

<section class="not-found">
    <svg xmlns="http://www.w3.org/2000/svg" width="135" height="135" viewBox="0 0 135 135" fill="none"
         class="not-found__svg--sun">
        <g filter="url(#filter0_f_503_805)">
            <ellipse cx="67.5" cy="67.5" rx="47" ry="47" transform="rotate(180 67.5 67.5)"
                     fill="url(#paint0_linear_503_805)"/>
        </g>
        <defs>
            <filter id="filter0_f_503_805" x="0.5" y="0.5" width="134" height="134" filterUnits="userSpaceOnUse"
                    color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                <feGaussianBlur stdDeviation="10" result="effect1_foregroundBlur_503_805"/>
            </filter>
            <linearGradient id="paint0_linear_503_805" x1="67.5" y1="20.5" x2="67.5" y2="114.5"
                            gradientUnits="userSpaceOnUse">
                <stop stop-color="#AFAD96"/>
                <stop offset="0.576923" stop-color="#F29337"/>
                <stop offset="0.75" stop-color="#ED772F"/>
                <stop offset="1" stop-color="#ED642D"/>
            </linearGradient>
        </defs>
    </svg>

    <h1 class="not-found__title"><?= __hepl('Page non trouvée'); ?></h1>
    <p class="not-found__message"><?= __hepl('Désolé, la page que vous recherchez n\'existe pas ou a été déplacée.'); ?></p>
    <div class="not-found__cta">
        <a href="<?= home_url(); ?>" title="<?= __hepl('Retour à la page d\'accueil'); ?>" target="_self" class="not-found__link">
            <?= __hepl('Retour à la page d’accueil'); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>
