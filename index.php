<?php
    get_header();
?>      
<?php include_once 'version/version.php'; ?>
    
<!-- CONTENT -->
<div class="container-flex">
        <div class="container-flex__nav-wrapper">
            <div class="container-flex__page-menu">
                <h2>Menü</h2>
                <ul class="items page-menu-items">
                    <li><a href="#">Unterseite 1</a></li>
                    <li><a href="#">Unterseite 2</a></li>
                    <li><a href="#">Eine weitere Unterseite</a></li>
                </ul>
            </div>

            <div class="container-flex__articles">
                <h2>Das Neuste aus dem BI</h2>
                <ul class="items article-items">
                    <?php 
                     $recent_posts = wp_get_recent_posts([
                         'numberposts' => 4,
                         'post_status' => 'publish'
                     ]);

                     foreach ($recent_posts as $post) :
                    ?>
                    <li><a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a>
                    <?php $categories = get_the_category($post['ID']);
                        foreach ($categories as $category) {
                            $cat_title = $category->name;
                            $cat_link = get_category_link($category->term_id);
                            echo "<a href='$cat_link'><span class='article-area'>$cat_title</a></span>";
                        }
                    ?>
                    </li>
                    <hr>
                     <?php endforeach; ?>

                </ul>
            </div>    
        </div>

    <div class="container-flex__content">
        <div class="bi-kompass-content-container">
        <h2>Suchleiste (Test)</h2>
        <?php
        /*
            Suchkomponente
        */
        $env = "http://localhost/bi-kompass/";

        $componentBaseUrl = $env . 'bi-kompass-component-service/';

        /*
            Einbinden geht auch über file_get_contents(), habe mich für die WP Variante entschieden
            Hier fehlt ein Token, der BIKCS mitteilt,
            dass die BI-WP Seite einen Request schickt und nicht irgendeine andere.
        */
        echo wp_remote_retrieve_body(
            wp_remote_get(
                $componentBaseUrl . 'search-component/view/show'
        ));
        ?>

        <hr>

        </div> <!-- bi-kompass-content-container -->
        
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <div class="bi-kompass-content-container">
                <h2><?php the_title(); ?></h2>
                <p>
            <?php the_content(); ?>   
                </p>
                <hr>
            </div> <!-- bi-kompass-content-container -->
            <?php
        endwhile;
        ?>          
    </div> <!-- content-container -->

    <div class="bi-app-container">
            <h3>Pfadfinder</h3>
            <ul class="items bi-app-container__items">
                <li><a href="#">Suche</a></li>
                <li><a href="#">Interaktiver Raumplan</a></li>
                <li><a href="#">IaK Finder</a></li>
            </ul>
    </div>    
</div> <!-- container-flex -->

<?php get_footer(); ?>