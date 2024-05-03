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
    <link rel="icon" type="image/png" href="../src/images/flashfoods-logo-f.png">
    
    <!-- css -->
    <link rel="stylesheet" href="../css/login-register-admin-support.css">
    
    <!-- jQuery -->
    <script src="/src/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/src/assets/js/slick-1.8.1/slick/slick.js"></script>
    <script src="/src/assets/js/dist/jquery.validate.js"></script>
    <script src="/src/assets/js/dist/additional-methods.js"></script>
</head>

<body id="grey-background">


    <div>
        <div id="white-background" class="center">
        <div class="return">
        <a href="../index.php">
            <button>Return</button>
        </a>
    </div>
            <div class="div-logo">
                <a href="../index.php"><img class="logo center" src="../images/flashfoods-logo.png" alt="logo-flashfood"></a>
            </div>  
            <div id="div-title">
                <a href="#">
                    <button id="technical-title">Technical Support</button>
                </a>
            </div>

        </div>

        <div id="main-div" class="main">
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
    <script src="/src/assets/js/main.js" defer></script>
</body>

</html>