<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Cupones</title>
    <link rel="stylesheet" href="/src/assets/css/discount-coupons.css" />
    <link rel="stylesheet" href="/src/assets/css/style.css" />
</head>

<body>
    <!-- Aside -->
    <?php require_once 'aside.php';?>

    <div class="center">
        <div class="info-form aligned">
            <h2>Cupones de descuento</h2>
            <article>
                <div class="plan">
                    <h3>Cupón McDonalds</h3>
                    <a href="#"><button>Mostrar código</button></a>
                </div>
                <div class="plan">
                    <h3>Cupón KFC</h3>
                    <a href="#"><button>Mostrar código</button></a>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
