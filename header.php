<!DOCTYPE html>
<html lang="de">
<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
       <!-- HEADER -->

    <!-- Logo, Schriftzug und Burgermenü -->
    <div class="header">
        <h2 class="header__title"><a href="<?php echo site_url('/'); ?>">BI - Kompass</a></h1>
    </div>
    
    <div id="nav" class="nav">
        <div id="js-burger" class="nav__burger-menu">
            <div class="burger-menu__line"></div>
            <div class="burger-menu__line"></div>
            <div class="burger-menu__line"></div>
        </div>
        <!-- Bereiche -->
        <div id="js-area-menu" class="menu area-menu">
            <ul>
                <li><a href="<?php echo site_url('/entwickler-bereich');?>" style="color:#fb8c84">Dev-Bereich</a></li>
                <li><a href="<?php echo site_url('/bi-primo'); ?>">Primo</a></li>
                <li><a href="<?php echo site_url('/bi-reha'); ?>">Reha</a></li>
                <li><a href="<?php echo site_url('/bi-vario'); ?>">Vario</a></li>
                <li><a href="<?php echo site_url('/bi-fachbereiche'); ?>">Fachbereiche</a></li>
                <li><a href="#">Suche</a></li>
            </ul>   
        </div>
        <!-- Menü für geschützten Bereich -->
        <div class="menu protected-area-menu">
            <ul>
                <!-- <li><a href="#">Stefan Simon</a></li> -->
                <li><a href="#">Login</a></li>
            </ul>
        </div>
        
    </div>

    <script>
        /*
        * Toggle Nav-Bar (Bei weniger als 769px)
        *
        * Klappt Menü ein und aus, wenn man das Burgersymbol klickt/berührt
        */
        const burger = document.getElementById('js-burger');
        const burgerNav = document.getElementById('js-area-menu');

        burger.addEventListener('click', function() {
            burgerNav.classList.toggle('is-active'); 
        }); 

    </script>