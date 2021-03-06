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
    wp_enqueue_script('my-test-script', get_template_directory_uri() . '/js/main.js', null, 1.1, true);
    wp_localize_script('my-test-script', 'magicalData', [
        "nonce" => wp_create_nonce('wp_rest'),
        "siteURL" => get_site_url()
        ]);
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
function bik_page_display_contents_header($post, $header_html = 'h3') {
    /* Nur den Titel der Bereichsseite anzeigen, damit man weiß, zu welchem Bereich der Inhalt gehört */
    $string ="";
    if ( is_page() && $post->post_parent ) {
        $string = get_the_title($post->post_parent);
    } else {
        $string = get_the_title();
    }
    $resultString = "<$header_html>$string</$header_html>";
    return $resultString;

}

/**
 * bik_list_current_posts_string_array
 *
 * gibt ein Array aus Strings in HTML-Form zurück.
 * "Neueste Beiträge" - Navigation
 *
 * @return array $list_array Liste aus li und a Tags
 */
function bik_current_posts_string_array() {
    /* CSS Klasse für die Kategorie-Verlinkung */
    $category_class = "article-area";

    $list_array = [];

    $recent_posts = wp_get_recent_posts([
        'numberposts' => 4,
        'post_status' => 'publish'
    ]);

    foreach ($recent_posts as $post) {
        $post_title = $post['post_title'];
        $post_link = get_permalink($post['ID']);
        $string = "<li><a href='$post_link'>$post_title</a> ";
        $categories = get_the_category($post['ID']);
        /*
         Trotz der foreach-Schleife sollte es eigentlich nur eine(!) Kategorie geben: den Bereich
        */
        foreach ($categories as $category) {
            $cat_title = $category->name;
            $cat_link = get_category_link($category->term_id);
            $string .= "<a href='$cat_link'><span class='$category_class'>$cat_title</span></a>";
        }

        $string .= "</li>\n";
        $list_array []= $string;
    }
    return $list_array;
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

/**
 * bik_category_menu_string
 *
 * @return string $list Liste der Kategorien ohne ul Eltern-Element
 */
function bik_category_menu_string(){
    $args = [
        'title_li' => '',
        'echo' => 0
    ];
    $list = wp_list_categories($args);
    return $list;
}