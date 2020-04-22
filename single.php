<?php
    get_header();
?>

<div class="container-flex">
        <div id="dev-page-links">
            <h2>Inhalt</h2>
            <?php 
                $pageTitle = get_the_title();
                $parentPageTitle = get_the_title($post->post_parent);
                if ($pageTitle != $parentPageTitle) :
                ?>
                    <h3><?php echo $parentPageTitle; ?></h3>
                <?php
                endif;
                ?>
            <h4><?php echo $pageTitle; ?></h4>
            <ul class="bi-menu bi-articles">
            <?php
            echo "single.php";
            include_once 'wp_src/page_src.php';
            //bi_get_articles();
            $args = [
                'post_type' => 'page',
                'post_parent' => $post->post_parent->ID,
            ];
            $menuQuery = new WP_Query($args);
            while ($menuQuery->have_posts()) : $menuQuery->the_post();
                ?>
                <li><a><?php the_title(); ?></a></li>
                <?php
            endwhile;
                    
            ?>
            </ul>
        </div>

        <div class="content-container">
        <?php
        $page_id = get_queried_object_id();
            $query = new WP_Query(['page_id' => $page_id]);
            while($query->have_posts()) : $query->the_post();
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
    
        
</div> <!-- container-flex -->



<?php 
    get_footer(); 
?>