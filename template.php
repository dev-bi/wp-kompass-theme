<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>BI - Kompass (BASIC TEMPLATE)</title>
</head>
<body>
    <!-- HEADER -->

    <!-- Logo, Schriftzug und Burgermenü -->
    <div class="header">
        <h2 class="header__title"><a href="#">BI - Kompass</a></h1>
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
                <li><a href="#" style="color:#fb8c84">Dev-Bereich</a></li>
                <li><a href="#">Primo</a></li>
                <li><a href="#">Reha</a></li>
                <li><a href="#">Vario</a></li>
                <li><a href="#">Fachbereiche</a></li>
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

    <!-- CONTENT -->
    <div class="container-flex">
        <div class="container-flex__nav-wrapper">
            <div class="container-flex__page-menu">
                <h2>Menü</h2>
                <ul class="items page-menu-items">
                    <li><a href="#">Unterseite 1</a></li>
                    <li><a href="#">Unterseite 2</a></li>
                    <li><a href="#">Eine weitere Unterseite</a></li>
                </ul>
            </div>

            <div class="container-flex__articles">
                <h2>Das Neuste aus dem BI</h2>
                <ul class="items article-items">
                    <li><a href="#"><span class="article-title">Das Brett ist schwer</span></a> <a href="#"><span class="article-area">Tischlerei</span></a></li>
                    <hr>
                    <li><a href="#"><span class="article-title">Der Server brennt</span></a> <a href="#"><span class="article-area">IT</span></a></li>
                    <hr>
                    <li><a href="#"><span class="article-title">Neue Excel-Vorlage</span></a> <a href="#"><span class="article-area">BüMe</span></a></li>
                </ul>
            </div>    
        </div>

        <div class="container-flex__content">
            <div class="bi-kompass-content-container">
                
            </div>
            
        </div> <!-- container-flex__content -->

        <div class="bi-app-container">
            <h3>Pfadfinder</h3>
            <ul class="items bi-app-container__items">
                <li><a href="#">Suche</a></li>
                <li><a href="#">Interaktiver Raumplan</a></li>
                <li><a href="#">IaK Finder</a></li>
            </ul>
        </div>  
    </div> <!-- container-flex -->
    
    <div id="footer" class="footer">
        <div class="footer__content">
            <a href="#">Impressum</a>
        </div>
        <div class="footer__content">
            <a href="#">Datenschutz</a>
        </div>
        <div class="footer__content">
            <a href="#">Noch ein Link</a>
        </div>
        
        
        
    </div>
    
</body>
</html>