<?php

function bi_get_articles () {
    /*
    * Environment
    */
    $category_dev = 3;
    $category_prod = 999;

    /* 
    * ToDo:
    * switch page_id:
    *    case 42 show posts from category = 3
    *    case 49 show posts from category = 4
    */
    $posts = get_posts(['category' => $category_dev]);
    foreach($posts as $post) :
    ?>
    <li><a href="<?php echo site_url('/' . $post->post_name) ?>"><?php echo $post->post_title; ?></a></li>
    <?php 
    endforeach;
    wp_reset_query();
    wp_reset_postdata();
}