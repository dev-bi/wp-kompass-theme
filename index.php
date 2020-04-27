<?php
    get_header();
?>      
<?php include_once 'version/version.php'; ?>
    
<div class="container-flex">
    <div id="dev-page-links">
        <h2>Hauptartikel</h2>
        
        <ul class="bi-menu bi-articles">
            <li><a href="#">Bericht über Corona</a></li>
            <li><a href="#">Tragisches Ende einer Ära</a></li>
            <li><a href="#">Neues aus der IT</a></li>
            <li><a href="#">Das Meerschwein quieckt lauter als gedacht</a></li>
            <li><a href="#">Ein neuer Bericht</a></li>
        </ul>
    </div>

    <div class="content-container">
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

    <div id="bi-app-container">
        <h3>Pfadfinder</h3>
        <ul class="bi-menu">
            <li><a href="#">Suche</a></li>
            <li><a href="#">Interaktiver Raumplan</a></li>
            <li><a href="#">IaK Finder</a></li>
        </ul>
    </div>    
</div> <!-- container-flex -->

<?php get_footer(); ?>