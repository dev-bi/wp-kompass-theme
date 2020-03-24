<?php
    get_header();
?>
<!--
 Wordpress Code
 
 the main loop in wordpress
-->
<?php
    while (have_posts()) :
        the_post();
    ?>
    <div>
        <p>Geschrieben von: <?php the_author(); ?></p>
        <p>Kategorien: <?php the_category(', '); ?></p>
    </div>
    <h2><?php the_title() ?></h2>
    <p><?php the_content() ?></p>
<?php
    endwhile;
?>

<?php
    get_footer();
?>