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

function test() {
  return "some test muh";
}

function bik_page_display_contents_header($post) {
  $string ="";
  if( is_page() && $post->post_parent ) {
    $string = get_the_title($post->post_parent);
  } else {
    $string = get_the_title();
  }
  $resultString = "<h3>$string</h3>";
  return $resultString;
}

function bik_list_child_pages($post) {

  $args = [
    'title_li' => '',
    'echo' => 0,
    'sort_column' => 'menu_order',
  ];

  if ( is_page() && $post->post_parent ) {
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