<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Alertas</title>
    <link rel="stylesheet" href="/src/assets/css/myalerts.css" />
    <link rel="stylesheet" href="/src/assets/css/style.css" />
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
                    <p>Chicken box por 4,99€</p>
                    <img src="/src/assets/img/burgers/burger-2.jpg" alt="">
                </div>
                <div class="plan">
                    <h3>Goiko Grill</h3>
                    <p>Prueba la hamburguesa premiada KevinPopsy</p>
                    <img src="/src/assets/img/burgers/burger-1.png" alt="">
                </div>
            </article>
        </div>
    </div>
</body>

</html>
