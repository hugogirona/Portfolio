<?php

// Charger les champs ACF exportés :
use JetBrains\PhpStorm\NoReturn;

include_once('fields.php');
include_once('forms/ContactForm.php');;

// Vérifier si la session est active ("started") ?
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Charge le domaine de traduction du thème.
 *
 * Cette fonction permet de charger les fichiers de traduction situés
 * dans le dossier `locales` du thème actif. Elle utilise la fonction
 * `load_theme_textdomain()` pour associer le domaine de traduction `hepl-trad`
 * aux fichiers de langue présents dans le répertoire spécifié.
 *
 * @return void
 */
function hepl_trad_load_textdomain(): void
{
    load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');
}

// Exécute la fonction lors de l'initialisation du thème.
add_action('after_setup_theme', 'hepl_trad_load_textdomain');

function __hepl(string $translation, array $replacements = []): array|string|null
{
// 1. Récupérer la traduction de la phrase présente dans $translation
    $base = __($translation, 'hepl-trad');

// 2. Remplacer toutes les occurrences des variables par leur valeur
    foreach ($replacements as $key => $value) {
        $variable = ':' . $key;
        $base = str_replace($variable, $value, $base);
    }

// 3. Retourner la traduction complète.
    return $base;
}

/**
 * Récupère la valeur d'un champ ACF d'une page d'option pour la langue courante.
 *
 * Cette fonction utilise Advanced Custom Fields PRO (ACF) et Polylang
 * pour récupérer la valeur d'un champ d'option spécifique en fonction
 * de la langue active sur le site.
 *
 * @param string $field Le nom du champ ACF à récupérer.
 * @return mixed La valeur du champ, ou `false` si le champ n'existe pas.
 *
 *
 */
function get__option($field): mixed
{
    return get_field($field, pll_current_language('slug'));
}

// Gutenberg est le nouvel éditeur de contenu propre à Wordpress
// il ne nous intéresse pas pour l'utilisation du thème que nous
// allons créer. On va donc le désactiver :

// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');
// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');

// Disable default front-end styles.
add_action('wp_enqueue_scripts', function () {
    // Remove CSS on the front end.
    wp_dequeue_style('wp-block-library');
    // Remove Gutenberg theme.
    wp_dequeue_style('wp-block-library-theme');
    // Remove inline global CSS on the front end.
    wp_dequeue_style('global-styles');
}, 20);

add_action('init', 'init_remove_support', 100);

function init_remove_support(): void
{
    remove_post_type_support('post', 'editor');
    remove_post_type_support('page', 'editor');
    remove_post_type_support('product', 'editor');
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_print_comments');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_generator');



// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end sans que cela ne s'applique à l'admin.
function portfolio_asset(string $file): string
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (isset($manifest['wp-content/themes/portfolio/resources/js/main.js']) && $file === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/js/main.js']['file']);
        }

        if (isset($manifest['wp-content/themes/portfolio/resources/css/styles.scss']) && $file === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/css/styles.scss']['file']);
        }
    }

    return get_template_directory_uri() . '/public/' . $file;
}

// Permet d'ajouter la possibilité d'uploader des extensions de fichiers non compatibles de base.
// Exemple : ici nous ajoutons le format SVG en tant que type d'image compatible pour l'upload.
function my_own_mime_types($mimes)
{
    // Ajout du mime type pour les fichiers SVG
    $mimes['svg'] = 'image/svg+xml';

    // Retourne le tableau des types MIME mis à jour
    return $mimes;
}

// Ajoute notre fonction de filtrage à l'action 'upload_mimes' pour permettre l'upload des fichiers SVG.
add_filter('upload_mimes', 'my_own_mime_types');

// Activer l'utilisation des vignettes (image de couverture) sur nos post types:
add_theme_support('post-thumbnails', ['project']);

// Enregistrer de nouveaux "types de contenu", qui seront stockés dans la table
// "wp_posts", avec un identifiant de type spécifique dans la colonne "post_type":


register_post_type('project', [
    'label' => 'Projets',
    'description' => "Les projets que j'ai réalisé",
    'menu_position' => 6,
    'menu_icon' => 'dashicons-portfolio',
    'public' => true,
    'has_archive' => false,
    'rewrite' => [
        'slug' => 'projets',
    ],
    'supports' => ['title', 'excerpt', 'thumbnail'],
]);

//add_filter('pll_get_post_types', function ($types) {
//    $types['project'] = true;
//    return $types;
//});

register_taxonomy('project_type', ['project'], [
    'labels' => [
        'name' => __hepl('Les types de projet'),
        'singular' => __hepl('Type de projet')
    ],
    'description' => 'Types de projet',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_tagcloud' => false,
    'rewrite' => ['slug' => __hepl('type-de-projet')],
],
);


// Enregistrer les menus de navigation en fonction de l'endroit où ils sont exploités :

register_nav_menu('header', 'Le menu de navigation principal en haut de la page.');
register_nav_menu('footer', 'Le menu de navigation de fin de page.');

// Créer une nouvelle fonction qui permet de retourner un menu de navigation formaté en un
// tableau d'objets afin de pouvoir l'afficher à notre guise dans le template.

// Ajouter un post-type custom pour sauvegarder les messages de contact

register_post_type('contact_message', [
    'label' => 'Messages de contact',
    'description' => 'Les envois de formulaire via la page de contact',
    'menu_position' => 10,
    'menu_icon' => 'dashicons-email',
    'public' => false,
    'show_ui' => true,
    'has_archive' => false,
    'supports' => ['title', 'editor'],
]);

// Ajouter la fonctionnalité "POST" pour un formulaire de contact personnalisé :
add_action('admin_post_dw_submit_contact_form', 'dw_handle_contact_form');
add_action('admin_post_nopriv_dw_submit_contact_form', 'dw_handle_contact_form');

// Chargement de notre class qui va gérer ce formulaire
//require_once(__DIR__ . '/forms/ContactForm.php');

function portfolio_handle_contact_form()
{
    $form = (new Portfolio_Theme\Forms\ContactForm())
        ->rule('fullname', 'required')
        ->rule('email', 'required')
        ->rule('email', 'email')
        ->rule('subject', 'required')
        ->rule('message', 'required')
        ->sanitize('fullname', 'sanitize_text_field')
        ->sanitize('email', 'sanitize_text_field')
        ->sanitize('subject', 'sanitize_text_field')
        ->sanitize('message', 'sanitize_textarea_field');

    return $form->handle($_POST);
}

// Créer une fonction qui permet de créer des pages d'options ACF pour le thème :
function create_site_options_page(): void
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Options du site',
            'menu_title' => 'Options du site',
            'menu_slug'  => 'site-options',
            'capability' => 'edit_posts',
            'redirect'   => false
        ]);
    }

    foreach (['fr', 'en', 'sq'] as $lang) {
        acf_add_options_sub_page([
            'page_title' => sprintf(__('Options du site %s', 'hepl-trad'), strtoupper($lang)),
            'menu_title' => sprintf(__('Options du site %s', 'hepl-trad'), strtoupper($lang)),
            'menu_slug' => 'site-options-' . $lang,
            'post_id' => $lang,
            'parent' => 'site-options',
        ]);
    }
}


add_action('acf/init', 'create_site_options_page');

//
///**
// * Génère une image responsive au format <picture> avec les attributs srcset et sizes.
// *
// * Cette fonction accepte différents formats d'entrée pour l'image (ID, tableau associatif ou URL),
// * et retourne un bloc HTML contenant une balise <picture> incluant une balise <img>.
// * Elle utilise les fonctions natives de WordPress pour récupérer les différentes tailles d'image
// * et ainsi permettre au navigateur de choisir la version la plus adaptée à l'affichage.
// *
// * @param mixed $image    ID de l'image, tableau contenant la clé 'ID' ou URL de l'image.
// * @param array $settings Tableau d'options complémentaires :
// *                        - 'lazy'    => attribut loading (default: "eager").
// *                        - 'classes' => classes CSS à ajouter à la balise <img>.
// *
// * @return bool|string Retourne le code HTML de l'image responsive, ou une chaîne vide si l'image est invalide.
// */
function responsive_image($image, $settings): bool|string
{
    if (empty($image)) {
        return '';
    }

    $image_id = '';

    if (is_numeric($image)) {
        // si c'est un nombre, on considère que cela s'agit d'un ID
        $image_id = $image;
    } elseif (is_array($image) && isset($image['ID'])) {
        // Si c'est un tableau associatif contenant la clé ID, on récupère cet ID
        $image_id = $image['ID'];
    } else {
        // Générer un tag img par défaut
    }
//
//// Récupération des informations de l'image depuis la base de données.
//    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); // Attribut alt
//    $image_post = get_post($image_id); // Object WP_Post de l'image
//    $title = $image_post->post_title ?? '';
//    $name = $image_post->post_name ?? '';
//
//// Récupération des URLS et attributs pour l'image en taille "full"
//// Wordpress génère automatiquement un srcset basé sur les tailles existantes
//    $src = wp_get_attachment_image_url($image_id, 'full');
//    $srcset = wp_get_attachment_image_srcset($image_id, 'full');
//    $sizes = wp_get_attachment_image_sizes($image_id, 'full');
//
//// Gestion de l'attribut de chargement "lazy" ou "eager" selon les paramètres.
//    $lazy = $settings['lazy'] ?? 'eager';
//
//// Gestion des classes (si des classes sont fournies dans $settings).
//    $classes = '';
//    if (!empty($settings['classes'])) {
//        $classes = is_array($settings['classes']) ? implode(' ', $settings['classes']) : $settings['classes'];
//    }
//
//    ob_start();
//    ?>
    <picture>
        <!-- Ici, vous pouvez ajouter manuellement des balises <source> pour d'autres formats (WebP, AVIF, etc.)
             si ces formats sont disponibles via un plugin ou un traitement personnalisé. -->
        <img
            src="<?= esc_url($src) ?>"
            alt="<?= esc_attr($alt) ?>"
            loading="<?= esc_attr($lazy) ?>"
            srcset="<?= esc_attr($srcset) ?>"
            sizes="<?= esc_attr($sizes) ?>"
            class="<?= esc_attr($classes) ?>">
    </picture>
    <?php
    return ob_get_clean();
}

add_filter('show_admin_bar', '__return_false');