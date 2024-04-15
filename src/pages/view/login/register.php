<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Flash Food gives you the best offers and discounts near you."/>
        <meta name="generator" content="FlashFood">
        <link rel="stylesheet" href="/src/assets/css/sign-up.css">
        <link rel="stylesheet" href="/src/assets/css/style.css">
        <title>FlashFood | Login</title>
    </head>

    <body id="grey-background" class="center">
        <div class="return">
            <a href="/src/pages/view/menu/index.php">
                <button>Return</button>
            </a>
        </div>

        <div id="white-background">    
            <img class="logo" src="/src/assets/img/logo.png" alt="logo-flashfood">

            <div id="login-or-signin">
                <a href="/src/pages/view/login/login.php">
                    <button id="login">Log in</button>
                </a>  
                <a href="#">
                    <button id="signup">Sign-up</button>
                </a>
                <a href="/src/pages/view/login/register-admin.php">
                    <button id="signup">Sign-up Admin</button>
                </a>  

            </div>
        </div>

        <form action="/src/pages/controller/UserController.php" method="post" id="register"  enctype="multipart/form-data">
            
            <div class="aligned main">
                <div>
                    <label for="email" class="mail">Correo electrónico</label>
                    <div>
                        <input type="email" name="mail">
                    </div>
                </div>

                <div>
                    <label for="user" class="mail">Usuario</label>
                    <div>
                        <input type="text" name="user">
                    </div>
                </div>

                <div>
                    <label for="password" class="password">Contraseña</label>
                    <div>
                        <input type="password" name="password">
                    </div>
                    <div class="support-box">
                        <a id="support" href="/src/pages/aside/soportetecnico.php">Contraseña olvidada o tienes algun problema?</a>
                    </div>
                </div>
                
                <input type="submit" name="register" value="Crear Cuenta">
            </div>   
        </form>
        
    </body>
</html>
