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
    <script src="/src/assets/js/style.js" defer></script>

    <title>FlashFood | Home</title>
</head>

<body id="map-body">
    <!-- Aside -->
    <?php require_once '../aside/aside.php';?>

    <aside id="menu-content-tablet">
        <button><img src="/src/assets/img/hamburger-menu.png" alt="hamburger-menu"></button>
    </aside>

    <div class="aligned left-side">
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

    <div class="aligned right-side">
        <!-- Search -->
        <div class="aligned center" id="search-bar">
            <input type="text" name="search" id="search" placeholder="Search restaurants" autocomplete="off">
                <div class="result-box"></div>
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

    <!-- <div class="aligned pop-up">
        <h2>McDonald's</h2>
        <p>McDonald's: I'm lovin' it</p>
        <div id="slider">
            <div>
                <img src="/src/assets/img/pop-up/mcdonalds-1.jpg" alt="mcdonalds-1">
            </div>
            <div>
                <img src="/src/assets/img/pop-up/mcdonalds-2.jpg" alt="mcdonalds-2">
            </div>
            <div>
                <img src="/src/assets/img/pop-up/mcdonalds-3.jpg" alt="mcdonalds-1">
            </div>
            <div>
                <img src="/src/assets/img/pop-up/mcdonalds-4    .jpg" alt="mcdonalds-4">
            </div>

        </div>
    </div> -->

    <!-- Login -->

    <?php require_once 'image.php';?>

    <!-- Zoom -->
    <footer>

        <div class="zoom">
            <div class="aligned">
                <button id="zoom-in">+</button>
            </div>
            <div class="aligned">
                <button id="zoom-out">-</button>
            </div>
        </div>
    </footer>

    <!-- Cookies -->
    <div class="cookies">
        <div class="aligned cookies-text">
            <p>We use cookies to improve your experience on our website and provide you with the best deals on fast food. By browsing Flash Foods, you accept our use of cookies.</p>
        </div>
        <div class="aligned cookies-button">
            <div class="aligned check">
                <button class="button-accept">ACCEPT</button>
            </div>
            <div class="aligned check">
                <a href="/src/pages/view/menu/cookies.html"><button>READ MORE ABOUT COOKIES</button></a>
            </div>

            <div id="cookies-close">
                <button class="button-close">X</button>
            </div>
        </div>
    </div>
</body>

</html>
