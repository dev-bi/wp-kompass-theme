<?php
    get_header();
?>

<div class="container-flex">
        <div id="dev-page-links">
            <h2>Inhalt</h2>
            <!-- Überschrift des Inahlts ist Titel der Hauptseite -->
            <?php echo bik_page_display_contents_header($post); ?>

            <ul class="bi-menu bi-articles">
            <!-- Links zu den Unterseiten dieser Seite anzeigen -->
            <?php echo bik_list_child_pages($post); ?>
            
            </ul>
        </div>
        <!-- Die Inhalte der angefragten Seite anzeigen -->
        <div class="content-container">
        <?php
        /*
            Die page_id wird ermittelt, damit WP weiß, von wecher Seite die Anfrage kommt.
        */
        $page_id = get_queried_object_id();
        $query = new WP_Query(['page_id' => $page_id]);
        while ($query->have_posts()) :
            $query->the_post();
            ?>

            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
            <?php
        endwhile;
        ?>
        </div> <!--content-container -->

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