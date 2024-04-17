<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Flash Food gives you the best offers and discounts near you." />
    <meta name="generator" content="FlashFood">
    <title>FlashFood | Technical Support</title>
    <link rel="stylesheet" href="/src/assets/css/technical-support.css">
    <link rel="stylesheet" href="/src/assets/css/style.css">

    <!-- jQuery -->
    <script src="/src/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/src/assets/js/slick-1.8.1/slick/slick.js"></script>
    <script src="/src/assets/js/dist/jquery.validate.js"></script>
    <script src="/src/assets/js/dist/additional-methods.js"></script>
    <script src="/src/assets/js/style.js" defer></script>
</head>

<body id="grey-background" class="center">
    <div class="return">
        <!-- Fix the return when the user is logged in and return it to index-user.php and when not logged in to index.php -->
        <a href="/src/pages/view/menu/index.php">
            <button>Return</button>
        </a>
    </div>

    <div>
        <div id="white-background">
            <img class="logo" src="/src/assets/img/logo.png" alt="logo-flashfood">

            <div id="login-or-signin">
                <a href="#">
                    <button id="login">Technical Support</button>
                </a>
            </div>

        </div>

        <div class="aligned main">
            <div>
                <label for="email" class="mail">Email</label>
                <div>
                    <input type="email">
                </div>
            </div>

            <div>
                <a href="/src/pages/view/login/index-user.html">
                    <button>Send</button>
                </a>
            </div>
            <div class="help-box">
                <p class="center">How can we help you?</p>

                <div>
                    <a href="#">
                        <button>I forgot or lost access to my login method.</button>
                    </a>

                </div>

                <div>
                    <a href="#">
                        <button>I don't receive the registration link by email.</button>
                    </a>
                </div>

                <div>
                    <a href="#">
                        <button>I can't access my account when I go through the registration process.</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>