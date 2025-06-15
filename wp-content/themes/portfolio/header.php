<!DOCTYPE html>
<html lang="<?= __hepl('fr') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= wp_get_document_title() ?></title>
    <meta name="description"
          content="<?= __hepl('Portfolio de Hugo Girona, artisan web en formation et passionné par ce qu\'il fait. Découvrez mes projets récents en création de sites web. Contactez-moi pour discuter de votre projet.') ?>">
    <meta name="author" content="Hugo Girona">
    <meta name="keywords" content="<?= __hepl('HEPL, Web Developer, Hugo Girona, Hugo, Girona, Web, portfolio, web development, artisan, SEO, Front-end, back-end, accessibility')?>">
    <meta property="og:title" content="<?= __hepl('Accueil - Hugo Girona - Développeur Web') ?>">
    <meta property="og:description" content="<?= __hepl('Hugo Girona - Développeur Web')?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= __hepl('Hugo Girona - Développeur Web')?>">
    <meta property="og:image:alt" content="<?= __hepl("Page d'accueil du portfolio de Hugo Girona")?>">

    <meta name="google-site-verification" content="xJSPkd6j8Ni_10tlHjnyFwur5-obIWCLT1OeDWS_P_8" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="<?= portfolio_asset('css'); ?>">
    <script src="<?= portfolio_asset('js') ?>" defer type="module"></script>
    <?php wp_head(); ?>
</head>


<?php
$current_url = home_url(add_query_arg([], $_SERVER['REQUEST_URI']));
?>

<body class="the_body" itemscope="" itemtype="https://schema.org/Person">

<a href="#content" class="skip-link"><?= __hepl('Aller au contenu principal') ?></a>

<div class="wrapper">
    <header class="header">
        <?php if (get_the_title()) : ?>
        <h1 class="screenreader__only">
            <?= get_the_title() ?>
        </h1>
        <?php endif; ?>

        <div class="bg-rect-l"></div>
        <div class="bg-rect-r"></div>

        <a class="nav__logo" href="<?= home_url() ?>" title="<?= __hepl('Se diriger vers la page d’accueil') ?>">
            <img src="<?= get_field('company_logo', 'option')['url'] ?>" alt="" height="48" width="48">
            <p class="nav__name"><?= get_field('company_name', 'option') ?></p>
        </a>


        <nav class="nav" aria-label="primary-navigation">
            <h2 class="screenreader__only"><?= __hepl('Navigation principale') ?></h2>

            <input type="checkbox"
                   id="burger-toggle"
                   class="nav__checkbox"
                   aria-label="<?= esc_attr(__hepl('Ouvrir le menu')) ?>"/>
            <label for="burger-toggle"
                   class="nav__burger"
                   tabindex="0"
                   aria-controls="nav-menu">
                &nbsp;
                <span class="nav__burger--line"></span>
            </label>

            <ul class="nav__container" id="nav-menu">
                <?php foreach (get__option('navigation') as $link) : ?>

                    <?php $active_class = ($link['link']['url'] === $current_url) ? 'current' : ''; ?>

                    <li class="nav__item <?= $active_class ?>">
                        <a class="nav__link <?= $active_class ?>"
                           href="<?= esc_url($link['link']['url']) ?>"
                           target="<?= esc_attr($link['link']['target'] ? $link['link']['target'] : '_self') ?>"
                           title="<?= esc_attr($link['link_title']) ?>"><?= esc_html($link['link']['title']) ?></a>
                    </li>

                <?php endforeach; ?>
                <li class="languages">
                    <ul class="languages__container">
                        <?php foreach (pll_the_languages(['raw' => true]) as $lang): ?>
                            <?php
                            $current_lang = pll_current_language();
                            $language_names = [
                                'fr' => [
                                    'fr' => 'Français',
                                    'en' => 'Anglais',
                                    'sq' => 'Albanais',
                                ],
                                'en' => [
                                    'fr' => 'French',
                                    'en' => 'English',
                                    'sq' => 'Albanian',
                                ],
                                'sq' => [
                                    'fr' => 'Frëngjisht',
                                    'en' => 'Anglisht',
                                    'sq' => 'Shqip',
                                ],
                            ];
                            ?>
                            <li class="languages__item<?= $lang['current_lang'] ? ' languages__item--current' : '' ?>">
                                <a href="<?= esc_url($lang['url']) ?>"
                                   lang="<?= esc_attr($lang['locale']) ?>"
                                   hreflang="<?= esc_attr($lang['locale']) ?>"
                                   class="languages__link"
                                   title="<?= esc_attr(__hepl('Changer la langue en ') . strtolower($language_names[$current_lang][$lang['slug']])) ?>">
                                    <?= esc_html($lang['slug']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

            </ul>

        </nav>
    </header>
    <main id="content">
