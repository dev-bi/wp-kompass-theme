<?php
/**
 * here we communicate with wordpress behind the scenes.
*/

/*
* Environment Setting
*/
$baseUrlDev = "http://localhost/bi-kompass";
$baseUrlProduction = "http://developer.lionysos.com";

/*
* Environment Setting End
*/

function bi_kompass_files (){
  wp_enqueue_style('sbar_sytle', 'http://localhost/bi-kompass' . '/bi-kompass-component-service/search-component/view/css');
  wp_enqueue_style('bi_main_styles', get_stylesheet_uri());
}

function load_google_fonts () {
  wp_register_style('google-fonts-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300');
  wp_enqueue_style('google-fonts-montserrat');
  wp_register_style('google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  wp_enqueue_style('google-fonts-poppins');
}

add_action('wp_enqueue_scripts', 'bi_kompass_files');
add_action('wp_print_styles', 'load_google_fonts');

function bi_kompass_features () {
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'bi_kompass_features');