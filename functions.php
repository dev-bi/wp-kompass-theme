<?php
/**
 * functions.php
 *
 * CSS und JS laden.
 * Funktionen werden hierhin ausgelagert, damit die Templatefiles übersichtlich bleiben und nicht voller PHP-Code sind.
*/

/**
 * bi_kompass_files
 *
 * bündelt alle css Dateien, auch die von den Komponenten BIKCS
 *
 * @return void
 */
function bi_kompass_files() {
    /* set environment */
    /* for local development */
    $env = "http://localhost/bi-kompass/";
    //$env = "http://developer.lionysos.com/";

    /* for server */
    //$env = getProdEnvironment;

    /* get stylesheet from bikcs: search-component */
    wp_enqueue_style('sbar_sytle', $env . 'bi-kompass-component-service/search-component/view/css');
    /* set the main stylesheet */
    wp_enqueue_style('bi_main_styles', get_stylesheet_uri());
}

/**
 * load_google_fonts
 *
 * Lädt alle externen fonts und fügt sie in den html header ein, der mit get_head() in die Templates geladen wird
 *
 * @return void
 */
function load_google_fonts() {
  wp_register_style('google-fonts-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300');
  wp_enqueue_style('google-fonts-montserrat');
  wp_register_style('google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  wp_enqueue_style('google-fonts-poppins');
}

/**
 * bi_kompass_features
 *
 * Bisher wird hier nur der title-tag im HTML Header geladen (Titel der Seite im title-tag).
 *
 * @return void
 */
function bi_kompass_features() {
    add_theme_support('title-tag');
}

/* Wordpress hooks */
add_action('wp_enqueue_scripts', 'bi_kompass_files');
add_action('wp_print_styles', 'load_google_fonts');
add_action('after_setup_theme', 'bi_kompass_features');

/**
 * bik_page_display_contents_header
 *
 * Zeigt Seitenüberschrift über Inhaltsverzeichnis an.
 * @param  WP_Post $post Der WP_Post aus dem Template
 * @return string $resultString Titel
 *
 */
function bik_page_display_contents_header($post) {
    /* Nur den Titel der Bereichsseite anzeigen, damit man weiß, zu welchem Bereich der Inhalt gehört */
    $string ="";
    if ( is_page() && $post->post_parent ) {
        $string = get_the_title($post->post_parent);
    } else {
        $string = get_the_title();
    }
    $resultString = "<h3>$string</h3>";
    return $resultString;

}

function bik_list_newest_posts() {
    $categoryString = "";
    $postTitleString = "";
    $postTitleString = $post->the_title();
    $resultString = "<li>$postTitleString</li>";
}

/**
 * bik_list_child_pages
 *
 * Auflistung der Unterseiten eines Bereichs (Hauptseite) als a-Elemente in li-Elementen
 * @param  WP_Post $post Der WP_Post aus dem Template
 * @return string $string String aus a-Elementen in li-Elementen
 */
function bik_list_child_pages($post) {
    /*
        Teile des Codes sind von hier:
        https://www.wpbeginner.com/wp-tutorials/how-to-display-a-list-of-child-pages-for-a-parent-page-in-wordpress/
    */

    /*
        $args für wp_list_pages($args) siehe:
        https://developer.wordpress.org/reference/functions/wp_list_pages/
    */
    $args = [
        'title_li' => '', // keine Überschrift und damit auch kein wrappen in ul-Element
        'echo' => 0,
        'sort_column' => 'menu_order',
    ];

    /*  Diese Abfrage ist wichtig, damit nur die Unterseiten der Hauptseite aufgelistet werden  */
    if (is_page() && $post->post_parent) {
        $args['child_of'] = $post->post_parent;
        $childPages = wp_list_pages($args);
    }
    else {
        $args['child_of'] = $post->ID;
        $childPages = wp_list_pages($args);
    }

    if ( $childPages ) {
        $string = $childPages;
    }
   
    return $string;
}