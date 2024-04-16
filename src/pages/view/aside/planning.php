
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
            <h2>Facturas por abono</h2>
            <article>
                <div class="plan">
                    <h3>Plan Gratuïto (Actual)</h3>
                    <a href="/src/pages/aside/planning1.html"><button>Información</button></a>
                    <a href="/src/pages/aside/planning2.html"><button>Cambiar plan</button></a>
                </div>
                <div class="plan">
                    <h3>Plan Premium</h3>
                    <a href="/src/pages/aside/planning2.html"><button>Mejorar suscripción</button></a>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
