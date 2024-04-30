<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Invoices</title>
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
            <h2>Planning</h2>
            <article>
                <div class="plan">
                    <h3>Premium Plan</h3>
                    <a href="/src/pages/aside/planning.html"><button>Information</button></a>
                    <a href="/src/pages/aside/planning1.html"><button>Change Plan</button></a>
                    <p>By upgrading to our premium plan, you'll unlock even more exclusive benefits. You'll enjoy premium offers at select restaurants, access special promotions only for premium users, and receive early notifications about new deals and launches. Additionally, you'll have priority customer service to ensure an even more personalized and satisfying experience. Enhance your culinary experience with our premium plan! Molestias, excepturi dolorem ea quod aliquid nam.</p>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
