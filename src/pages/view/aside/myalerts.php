<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Alerts</title>
    <link rel="stylesheet" href="/src/assets/css/myalerts.css" />
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
            <h2>My alerts</h2>
            <article>
                <div class="plan">
                    <h3>KFC</h3>
                    <p>Chicken box for 4,99€</p>
                    <img src="/src/assets/img/burgers/burger-2.jpg" alt="">
                </div>
                <div class="plan">
                    <h3>Goiko Grill</h3>
                    <p>Try the award-winning KevinPopsy burger.</p>
                    <img src="/src/assets/img/burgers/burger-1.png" alt="">
                </div>
            </article>
        </div>
    </div>
</body>

</html>
