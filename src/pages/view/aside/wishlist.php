<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Lista deseos</title>
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
            <h2>Mi lista de deseos</h2>
            <article>
                <div class="plan">
                    <p>
                        1. McDonald's: Combo Big Mac por 4,50€<br>
                        2. Burger King: 2 Whoppers por 8,50€<br>
                        3. Subway: Sub del día por 4€<br>
                        4. KFC: Cubo de pollo frito por 8,50€<br>
                        5. Domino's Pizza: 2 pizzas medianas por 13€<br>
                        6. Taco Bell: Combo de tacos por 4,50€<br>
                        7. Wendy's: Hamburguesa con queso por 0,90€
                    </p>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
