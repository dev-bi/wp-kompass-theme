<?php
/**
 * Hier wird ein Artikel angezeigt, nachdem er angeklickt wurde.
 * siehe: https://developer.wordpress.org/themes/basics/template-files/
 */
    get_header();
?>

<!-- CONTENT -->
<div class="container-flex">
        <div class="container-flex__nav-wrapper">
            <div class="container-flex__page-menu">
                <h2>Artikel und Beiträge</h2>
                <ul class="items page-menu-items">
                    <?php echo bik_category_menu_string(); ?>
                </ul>
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
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <div class="bi-kompass-content-container">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
                <div>
                    <button id="js-test-button">Klick mich!</button>
                    <div id="js-test-container"></div>
                </div>
                <div id="users-post" class="users-quick-add">
                    <h3>Schreibe einen Beitrag</h3>
                    <input class="users-quick-add__form-element" type="text" name="title" placeholder="Titel des Beitrags">
                    <textarea class="users-quick-add__form-element" type="text" name="content" placeholder="Hier den Inhalt hineinschreiben..."></textarea>
                    <button class="users-quick-add__form-element" id="quick-add-button">Veröffentlichen</button>
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




<?php 
    get_footer(); 
?>