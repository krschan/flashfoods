<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Facturas</title>
    <link rel="stylesheet" href="/src/assets/css/planning.css" />
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
            <h2>Planning</h2>
            <article>
                <div class="plan">
                    <h3>Free Plan (Current)</h3>
                    <a href="/src/pages/aside/planning.html"><button>Information</button></a>
                    <a href="/src/pages/aside/planning2.html"><button>Change plan</button></a>
                    <p>"With our free plan, you'll have access to a wide variety of fast food offers in your area. 
                        You can explore different restaurants, view their menus, and discover exclusive discounts 
                        to enjoy your favorite dishes at special prices. All of this is available for free and easy to use!"</p>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
