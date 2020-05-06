<?php
    get_header();
?>

<div class="container-flex">

    <div class="container-flex__nav-wrapper">
        <div class="container-flex__page-menu">
                <!-- Überschrift des Inahlts ist Titel der Hauptseite -->
                <?php echo bik_page_display_contents_header($post, 'h2'); ?>

                <ul class="items page-menu-items">
                <!-- Links zu den Unterseiten dieser Seite anzeigen -->
                <?php echo bik_list_child_pages($post); ?>
                
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
        <!-- Die Inhalte der angefragten Seite anzeigen -->
        <div class="container-flex__content">
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