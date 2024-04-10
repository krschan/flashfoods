<?php
    session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Flash Food gives you the best offers and discounts near you." />
    <meta name="generator" content="FlashFood">
    <link rel="stylesheet" href="/src/assets/css/technical-support.css">
    <link rel="stylesheet" href="/src/assets/css/style.css">
    <title>FlashFood | Login</title>
</head>

<body id="grey-background" class="center">
    <div class="return">

    <!-- Arreglar el return cuando el usuario este logueado y devolverlo a index-user.php y cuando no este logueado a index.php -->
        <a href="/src/pages/view/menu/index.php">
            <button>Return</button>
        </a>
    </div>

    <div>
        <div id="white-background">
            <img class="logo" src="/src/assets/img/logo.png" alt="logo-flashfood">

            <div id="login-or-signin">
                <a href="#">
                    <button id="login">Soporte técnico</button>
                </a>
            </div>

        </div>

        <div class="aligned main">
            <div>
                <label for="email" class="mail">Correo electrónico</label>
                <div>
                    <input type="email">
                </div>
            </div>

            <div>
                <a href="/src/pages/view/login/index-user.html">
                    <button>Enviar</button>
                </a>
            </div>
            <div class="help-box">
                <p class="center">¿Cómo te podemos ayudar?</p>

                <div>
                    <a href="#">
                        <button>He olvidado o perdido el acceso a mi método de inicio de sesión.</button>
                    </a>

                </div>

                <div>
                    <a href="#">
                        <button>No recibo el enlace de registro por correo electrónico.</button>
                    </a>
                </div>

                <div>
                    <a href="#">
                        <button>No consigo acceder a mi cuenta cuando realizo el proceso de registro.</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
