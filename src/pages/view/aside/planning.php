
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Planning</title>
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
                    <h3>Free Plan (Current)</h3>
                    <a href="/src/pages/view/aside/planning1.php"><button>Information</button></a>
                    <a href="/src/pages/view/aside/planning2.php"><button>Change plan</button></a>
                </div>
                <div class="plan">
                    <h3>Premium Plan</h3>
                    <a href="/src/pages/view/aside/planning2.php"><button>Upgrade subscription</button></a>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
