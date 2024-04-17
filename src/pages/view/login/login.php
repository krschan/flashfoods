<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Flash Food gives you the best offers and discounts near you."/>
        <meta name="generator" content="FlashFood">
        <link rel="stylesheet" href="/src/assets/css/login.css">
        <link rel="stylesheet" href="/src/assets/css/style.css">
        <title>FlashFood | Login</title>

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
                <a href="#">
                    <button id="login">Log in</button>
                </a>  
                <a href="/src/pages/view/login/register.php">
                    <button id="signup">Sign-up</button>
                </a>  
                <a href="/src/pages/view/login/register-admin.php">
                    <button id="signup">Sign-up Admin</button>
                </a>  
            </div>
        </div>

        <form action="/src/pages/controller/UserController.php" method="post" id="login"> 
            
            <div class="aligned main">
                <div class="center">
                    <button>
                        <img class="signin-faster" src="/src/assets/img/google.png" alt="sign-in-with-google">
                    </button>
                    <button>
                        <img class="signin-faster" src="/src/assets/img/apple.png" alt="sign-in-with-apple">
                    </button>
                    <button>
                        <img class="signin-faster" src="/src/assets/img/mail.png" alt="sign-in-with-mail">
                    </button>
                </div>

                <div>
                    <label for="username">Username</label>
                    <div>
                        <input type="text" name="username">
                    </div>
                </div>

                <div>
                    <label for="password">Password</label>
                    <div>
                        <input type="password" name="password">
                    </div>
                    <div class="support-box">
                        <a id="support" href="/src/pages/view/aside/technical-support.php">Forgot password or having trouble?</a>
                    </div>
                </div>
                
                <input type="submit" name="login" value="Log in">
                <?php
                    if(isset($_SESSION['error'])) {
                        echo "<p style='color: red;'>".$_SESSION['error']."</p>";
                        unset($_SESSION['error']);
                    }
                    
                ?>

            </div>   
        </form> 
    </body>
</html>
