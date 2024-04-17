<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | History</title>
    <link rel="stylesheet" href="/src/assets/css/history.css" />
    <link rel="stylesheet" href="/src/assets/css/style.css" />

    <!-- jQuery -->
    <script src="/src/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/src/assets/js/slick-1.8.1/slick/slick.js"></script>
    <script src="/src/assets/js/dist/jquery.validate.js"></script>
    <script src="/src/assets/js/dist/additional-methods.js"></script>
    <script src="/src/assets/js/style.js" defer></script>
</head>

<body>
    <!-- Aside -->
    <?php require_once 'aside.php';?>

    <div class="center">
        <div class="info-form aligned">
            <h2>History</h2>
            <article>
                <div class="direccion-message">
                    <p>
                        <span class="bold">Hamburgers Express | 13:30 hrs</span> <br>
                        Today we decided to visit Hamburguesas Express at noon to try their famous cheeseburger. 
                        The place was lively and the staff very friendly. We ordered our burgers and in a few minutes, 
                        they were already on the table. The meat was juicy, the bun fresh, and the fries crispy. 
                        A delicious experience that we will definitely repeat!
                    </p><br>
                    <p>
                        <span class="bold">Pizzería Veloz | 19:00 hrs</span> <br>
                        Last night we went to Pizzería Veloz to have dinner with friends. 
                        The atmosphere was cozy, with background music and a tempting smell 
                        of freshly baked pizza. We tried the pepperoni pizza and the vegetarian one, 
                        both were delicious. The crust was thin and crispy, and the ingredients fresh. 
                        Definitely a perfect place for a casual and tasty dinner.
                    </p><br>
                    <p><span class="bold">Tacos Picantes | 14:45 hrs</span> <br>
                        This afternoon we decided to try the tacos at Tacos Picantes to enjoy a quick and tasty lunch. 
                        The place was full of people, which is always a good sign in a Mexican food spot. 
                        We tried the al pastor tacos and the carnitas ones, and they were incredible! 
                        The meat was well-seasoned, and the salsas gave it the perfect touch. 
                        Definitely a place we will be returning to soon.
                    </p>
                    <p>
                        ...
                    </p>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
