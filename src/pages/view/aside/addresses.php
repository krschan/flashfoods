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
            <h2>Addresses</h2>
            <article>
                <div class="direccion-message">
                    <p>
                    Are you willing to allow access to your location to enhance your 
                    experience on our website? Your location will help us provide you 
                    with a more personalized service tailored to your needs. 
                    Do you agree to share your location with us?
                    </p>
                    <button>Deny</button>
                    <button>Accept</button>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
