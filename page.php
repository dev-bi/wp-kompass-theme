<?php
    get_header();
?>

<div class="container-flex">
        <div id="dev-page-links">
            <h2>PAGE-NAME: REPLACE LATER</h2>
            <ul class="bi-menu bi-articles">
                <li><a href="entwickler-bereich">GitHub Workflow</a></li>
                <li><a href="bi-kompass-todo-liste">Aufgaben (mit Anleitung)</a></li>
                <li><a href="bikcs-was-ist-das">BIKCS – Was ist das?</a></li>
                <li><a href="die-daten">Über die Datenbank</a></li>
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