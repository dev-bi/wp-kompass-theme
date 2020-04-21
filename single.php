<?php
    get_header();
?>

<div class="container-flex">
        <div id="dev-page-links">
        <h2>Inhalt</h2>
            <h3><?php echo get_the_title(); ?></h3>
            <ul class="bi-menu bi-articles">
            <?php
                    /*
                    * Environment
                    */
                    $category_dev = 3;
                    $category_prod = 999;

                    /* use WP_Query(args) */
                    $posts = get_posts(['category' => $category_dev]);
                    foreach($posts as $post) :
                    ?>
                    <li><a href="<?php echo site_url('/' . $post->post_name) ?>"><?php echo $post->post_title; ?></a></li>
                    <?php 
                    endforeach;
                ?>
            </ul>
        </div>

        <div class="content-container">
        <?php
            while(have_posts()) :
                the_post();
                ?>

            <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
                <?php
            endwhile;
            ?>
        </div>

        <div id="bi-app-container">
            <h3>Pfadfinder</h3>
            <ul class="bi-menu">
                <li><a href="#">Suche</a></li>
                <li><a href="#">Interaktiver Raumplan</a></li>
                <li><a href="#">IaK Finder</a></li>
            </ul>
        </div>
    
        
    </div>



<?php 
    get_footer(); 
?>