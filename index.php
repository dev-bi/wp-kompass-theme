<?php
    get_header();
?>      
<?php include_once 'version/version.php'; ?>
    
<!-- CONTENT -->
<div class="container-flex">
        <div class="container-flex__nav-wrapper">
            <div class="container-flex__page-menu">
                <h2>Willkommen <span>~Username~</span></h2>
            </div>

            <div class="container-flex__articles">
                <h2>Das Neuste aus dem BI</h2>
                <ul class="items article-items">
                <?php
                $elements = bik_current_posts_string_array();
                foreach ($elements as $element) {
                    echo $element . "<hr>\n";
                }
                ?>
                </ul>
            </div>    
        </div>

    <div class="container-flex__content">
        <div class="bi-kompass-content-container">
        <h2>Was suchst du?</h2>
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
        </div> <!-- bi-kompass-content-container -->

        <?php
        while (have_posts()) :
            the_post();
            ?>
            <div class="bi-kompass-content-container">
                <h2><?php the_title(); ?></h2>
                <?php the_excerpt(); ?>
                <p><?php //the_content(); ?></p>
                <div class="read-more">
                    <a class="read-more__link" href="<?php the_permalink()?>">Lies mich</a>
                </div>
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