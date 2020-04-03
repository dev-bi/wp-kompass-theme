<?php
/**
 * here we communicate with wordpress behind the scenes.
*/

/**
  * example:
  * add_action(wp_hook, name_of_my_function);
*/

function bi_kompass_files(){
  wp_enqueue_style('sbar_sytle', '//localhost/bi-kompass/bi-kompass-component-service/search-component/view/css');
  wp_enqueue_style('bi_main_styles', get_stylesheet_uri());
}

function load_google_fonts () {
  wp_register_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300');
  wp_enqueue_style('google-fonts');
}

add_action('wp_enqueue_scripts', 'bi_kompass_files');
add_action('wp_print_styles', 'load_google_fonts');