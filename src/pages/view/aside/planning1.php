<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Facturas</title>
    <link rel="stylesheet" href="/src/assets/css/planning.css" />
    <link rel="stylesheet" href="/src/assets/css/style.css" />
</head>

<body>
    <!-- Aside -->
    <?php require_once 'aside.php';?>

    <div class="center">
        <div class="info-form aligned">
            <h2>Facturas por abono</h2>
            <article>
                <div class="plan">
                    <h3>Plan Gratuïto (Actual)</h3>
                    <a href="/src/pages/aside/planning.html"><button>Información</button></a>
                    <a href="/src/pages/aside/planning2.html"><button>Cambiar plan</button></a>
                    <p> Con nuestro plan gratuito, tendrás acceso a una amplia variedad de ofertas de comida rápida en tu área. Podrás explorar diferentes restaurantes, ver sus menús y descubrir descuentos exclusivos para disfrutar de tus platillos favoritos a precios especiales. ¡Todo esto de forma gratuita y fácil de usar!</p>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
