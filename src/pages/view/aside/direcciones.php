<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Direcciones</title>
    <link rel="stylesheet" href="/src/assets/css/direcciones.css" />
    <link rel="stylesheet" href="/src/assets/css/style.css" />
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
