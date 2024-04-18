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
        <link rel="stylesheet" href="/src/assets/css/register.css">
        <link rel="stylesheet" href="/src/assets/css/style.css">
        <title>FlashFood | Register</title>

        <!-- jQuery -->
        <script src="/src/assets/js/jquery-3.7.1.min.js"></script>
        <script src="/src/assets/js/slick-1.8.1/slick/slick.js"></script>
        <script src="/src/assets/js/dist/jquery.validate.js"></script>
        <script src="/src/assets/js/dist/additional-methods.js"></script>
        <script src="/src/assets/js/style.js" defer></script>   
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
                    <button id="signup-admin">Sign-up Admin</button>
                </a>  

            </div>
        </div>

        <form action="/src/pages/controller/UserController.php" method="post" id="register"  enctype="multipart/form-data">
            
            <div class="aligned main">
                <div>
                    <label for="email" class="mail">Email</label>
                    <div>
                        <input type="email" name="mail">
                    </div>
                </div>

                <div>
                    <label for="user" class="mail">Username</label>
                    <div>
                        <input type="text" name="user">
                    </div>
                </div>

                <div>
                    <label for="password" class="password">Password</label>
                    <div>
                        <input type="password" name="password">
                    </div>
                    <div class="support-box">
                        <a id="support" href="/src/pages/aside/technical-support.php">Forgot password or having trouble?</a>
                    </div>
                </div>
                
                <input type="submit" name="register" value="Create Account" class="input-signin">
            </div>   
        </form>
        
    </body>
</html>
