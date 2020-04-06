<?php
    get_header();
?>

        <?php //include_once 'bi-suche/suche_test.php'; ?>

        <!--    
            Suchleiste aus Component Service holen und anzeigen 
            css datei wird in der functions.php geladen
        -->
        <?php //echo file_get_contents('http://localhost/bi-kompass/bi-kompass-component-service/search-component/view/show'); ?>
        
        

        <!-- Suchleiste in bi-suche/suche_test.php -->

        <!--
        <div id="search-wrapper" class="container">
            <div id="search-bar">
                <label>BI - Suche</label>
                <input type="text" name="sstring" placeholder="Suchbegriff eingeben...">
            </div>
        </div>
        -->
        
        <!-- Inhalt-->
        <?php include_once 'version/version.php'; ?>
        <div class="container-flex">
        <div id="dev-page-links">
            <h2>Hauptartikel</h2>
            
            <ul class="bi-menu">
                <li><a href="#">Bericht über Corona</a></li>
                <li><a href="#">Tragisches Ende einer Ära</a></li>
                <li><a href="#">Neues aus der IT</a></li>
                <li><a href="#">Das Meerschwein quieckt lauter als gedacht</a></li>
                <li><a href="#">Ein neuer Bericht</a></li>
            </ul>
        </div>

        <div class="content-container">
             <?php //include_once 'version/version.php'; ?>
            <!--
            the main loop in wordpress
            -->
            <div class="bi-kompass-content-container">
            <h2>Suchleiste (Test)</h2>
            <?php echo wp_remote_retrieve_body(
            wp_remote_get(
                'http://localhost/bi-kompass/bi-kompass-component-service/search-component/view/show'
            ));
        ?>

            <hr>
            </div>
            

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
            </div>
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

<?php get_footer(); ?>