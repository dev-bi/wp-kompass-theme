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

add_action('wp_enqueue_scripts', 'bi_kompass_files');