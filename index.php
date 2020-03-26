<?php
    get_header();
?>

        <!-- BI Apps -->
        <div id="nav-bar-right">
            <div id="nav-bar-right-header">Kompass - Pfadfinder</div>
            <div id="nav-bar-right-content">
                <ul>
                    <li class="nav-bar-right-content-element"><a href=#>Suche</a></li>
                    <li class="nav-bar-right-content-element"><a href="#">Interaktiver Raumplan</a></li>
                    <li class="nav-bar-right-content-element"><a href="#">IaK - Finder</a></li>
                </ul>
                <!--
                <div class="nav-bar-right-content-element">Suche</div>
                <div class="nav-bar-right-content-element">Interaktiver Raumplan</div>
                <div class="nav-bar-right-content-element">IaK-Finder</div>
                -->
            </div>
        </div>
        <!-- Suchleiste-->
        <div id="search-wrapper" class="container">
            <div id="search-bar">
                <label>BI - Suche</label>
                <input type="text" name="sstring" placeholder="Suchbegriff eingeben...">
            </div>
        </div>
        <!-- Inhalt-->
        <div id="content-wrapper" class="container">
            <!--
            the main loop in wordpress
            -->
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



<?php get_footer(); ?>