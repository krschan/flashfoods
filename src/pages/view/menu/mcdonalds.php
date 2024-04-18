<?php
session_start();

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
        <link rel="stylesheet" href="/src/assets/css/mcdonalds.css">
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

    <body>
        <?php require_once '../aside/aside.php';?>
        
        <div class="info-box">
            <div class="info-form aligned">
                <h2>McDonald's</h2>
                <h3>I'm lovin' it</h3>
                <div id="slider">
                    <div class="center">
                        <img src="/src/assets/img/pop-up/mcdonalds-1.jpg" alt="mcdonalds-1">
                    </div>
                    <div>
                        <img src="/src/assets/img/pop-up/mcdonalds-2.jpg" alt="mcdonalds-2">
                    </div>
                    <div>
                        <img src="/src/assets/img/pop-up/mcdonalds-3.jpg" alt="mcdonalds-1">
                    </div>
                    <div>
                        <img src="/src/assets/img/pop-up/mcdonalds-4.jpg" alt="mcdonalds-4">
                    </div>
            
                </div>
                <p>McDonald's is a globally recognized fast food restaurant chain. Founded in 1940, 
                    the company has expanded over the years and offers a variety of products such as hamburgers, 
                    fries, beverages, desserts, and breakfast options. With its distinctive golden arches logo, 
                    McDonald's is known for its quick customer service and its presence in numerous countries worldwide.</p>
                    <div class="opinion-box">
                <h3 id="opinion-title">Opinions</h3>
                    <div class="opinion">
                        <hr>
                        <p class="italic">@jose.portugal</p>
                        <p>Excellent food and service! Would definitely recommend McDonald's to all my friends.</p>
                    </div>
                    <div class="opinion">
                        <hr>
                        <p class="italic">@cristian.catala</p>
                        <p>I'm not very impressed. The food was quite mediocre and the service was slow.</p>
                    </div>
                    <div class="opinion">
                        <hr>
                        <p class="italic">@feliu.castella</p>
                        <p>I've been doing some Linux work with a Manuel Turizo menu and I loved it!</p>
                    </div>
                </div>
                
            </div>
        </div>

    </body>

</html>
