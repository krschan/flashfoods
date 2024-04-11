<?php
session_start();
//
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Flash Food gives you the best offers and discounts near you." />
        <meta name="generator" content="FlashFood">

        <!-- CSS -->
        <link rel="stylesheet" href="/src/assets/css/style.css">
        <link rel="stylesheet" href="/src/assets/css/index.css">
        <link rel="stylesheet" href="/src/assets/js/slick-1.8.1/slick/slick.css">
        <link rel="stylesheet" href="/src/assets/js/slick-1.8.1/slick/slick-theme.css">

        <!-- jQuery -->
        <script src="/src/assets/js/jquery-3.7.1.min.js"></script>
        <script src="/src/assets/js/slick-1.8.1/slick/slick.js"></script>
        <script src="/src/assets/js/dist/jquery.validate.js"></script>
        <script src="/src/assets/js/dist/additional-methods.js"></script>
        <script src="/src/assets/js/index.js" defer></script>

        <title>FlashFood | home</title>
    </head>

    <body id="map-body">
        <!-- Aside -->  
        <?php require_once '../aside/aside.php';?>

        <aside id="menu-content-tablet">
            <button><img src="/src/assets/img/hamburger-menu.png" alt="hamburger-menu"></button>
        </aside>

        <div class="aligned left">
        </div>

        <div class="search-box aligned">
            <div id="search-right">
                <button><img src="/src/assets/img/brands/mcdonalds.png" alt="mcdonalds"></button>
                <button><img src="/src/assets/img/brands/burger-king.png" alt="burger-king"></button>
                <button><img src="/src/assets/img/brands/kfc.png" alt="kfc"></button>
                <button><img src="/src/assets/img/brands/taco-bell.png" alt="taco-bell"></button>
                <button><a href="/src/index-tablet.html"><img src="/src/assets/img/lupa.png" alt="search-restaurant"></a></button>
            </div>
        </div>

        <div class="aligned right">
            <!-- Search -->
            <div class="aligned center" id="search-bar">
                <input type="text" name="search" id="search">
            </div>

            <!-- Filters -->
            <div class="aligned center" id="filters">
                <div class="aligned">
                    <button>PIZZA</button>
                </div>

                <div class="aligned">
                    <button>BURGER</button>
                </div>

                <div class="aligned">
                    <button>RAMEN</button>
                </div>

                <div class="aligned">
                    <button>PASTA</button>
                </div>
                <div class="aligned">
                    <button>SUSHI</button>
                </div>
                <div class="aligned">
                    <button>ARROZ</button>
                </div>
                <div class="aligned">
                    <button>WAFFLE</button>
                </div>
            </div>
        </div>

        <!-- Login -->

        <?php require_once 'image.php';?>

        <!-- Zoom -->
        <footer>

            <div class="zoom">
                <div class="aligned">
                    <a href="/src/view/pages/index.html">
                        <button id="+">+</button>
                    </a>
                </div>
                <div class="aligned">
                    <button id="-">-</button>
                </div>
            </div>
        </footer>

        <!-- Cookies -->
        <div class="cookies">
            <div class="aligned cookies-text">
                <p>Utilizamos cookies para mejorar tu experiencia en nuestro sitio web y ofrecerte 
                    las mejores ofertas en comida rápida. Al navegar en Flash Foods, aceptas nuestro uso de cookies.</p>
            </div>
            <div class="aligned cookies-button">
                <div class="aligned check">
                    <button class="button-accept">ACEPTAR</button>
                </div>
                <div class="aligned check">
                    <a href="/src/pages/view/menu/cookies.html"><button>LEER MÁS COOKIES</button></a>
                </div>

                <div id="cookies-close">
                    <button>X</button>
                </div>
            </div>
        </div>
    </body>

</html>
