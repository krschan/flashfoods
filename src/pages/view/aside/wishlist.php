<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Wishlist</title>
    <link rel="stylesheet" href="/src/assets/css/wishlist.css" />
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
            <h2>Wishlist</h2>
            <article>
                <div class="plan">
                    <p>
                        1. McDonald's: Big Mac Combo for €4.50<br>
                        2. Burger King: 2 Whoppers for €8.50<br>
                        3. Subway: Sub of the Day for €4<br>
                        4. KFC: Fried Chicken Bucket for €8.50<br>
                        5. Domino's Pizza: 2 medium pizzas for €13<br>
                        6. Taco Bell: Taco Combo for €4.50<br>
                        7. Wendy's: Cheeseburger for €0.90
                    </p>
                </div>
            </article>
        </div>
    </div>

</body>

</html>
