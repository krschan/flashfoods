<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Addresses</title>
    <link rel="stylesheet" href="/src/assets/css/addresses.css" />
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
            <h2>Direcciones</h2>
            <article>
                <div class="direccion-message">
                    <p>
                        ¿Estás de acuerdo en permitir el acceso a tu ubicación para mejorar tu experiencia en nuestra web? Tu ubicación nos ayudará a brindarte un servicio más personalizado y adaptado a tus necesidades. ¿Aceptas compartir tu ubicación con nosotros?
                    </p>
                    <button>Denegar</button>
                    <button>Aceptar</button>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
