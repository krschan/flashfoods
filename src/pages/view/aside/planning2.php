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
                    <h3>Plan Premium</h3>
                    <a href="/src/pages/aside/planning.html"><button>Información</button></a>
                    <a href="/src/pages/aside/planning1.html"><button>Cambiar plan</button></a>
                    <p>Al actualizar a nuestro plan premium, desbloquearás aún más beneficios exclusivos. Podrás disfrutar de ofertas premium en restaurantes selectos, acceder a promociones especiales solo para usuarios premium y recibir notificaciones anticipadas sobre nuevas ofertas y lanzamientos. Además, contarás con un servicio de atención al cliente prioritario para garantizar una experiencia aún más personalizada y satisfactoria. ¡Mejora tu experiencia culinaria con nuestro plan premium! Molestias, excepturi dolorem ea quod aliquid nam.</p>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
