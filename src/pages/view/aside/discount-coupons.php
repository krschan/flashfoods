<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Coupons</title>
    <link rel="stylesheet" href="/src/assets/css/discount-coupons.css" />
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
            <h2>Discount coupons</h2>
            <article>
                <div class="plan">
                    <h3>McDonald's coupon</h3>
                    <a href="#"><button>Show code</button></a>
                </div>
                <div class="plan">
                    <h3>KFC's coupon</h3>
                    <a href="#"><button>Show code</button></a>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
