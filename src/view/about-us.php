<?php

include '../controller/ShowAfilliations.php';

$showAffiliations = new ShowAfilliations();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Flash Food gives you the best offers and discounts near you." />
    <meta name="generator" content="FlashFood">
    <title>FlashFood | About us</title>
    <link rel="icon" type="image/png" href="../src/images/flashfoods-logo-f.png">

    <!-- jQuery -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/slick-1.8.1/slick/slick.min.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="../css/about-us.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>

<body id="body-background">
    <div>
        <div id="header-background" class="center">
            <div class="return-button">
                <a href="../index.php">
                    <button>Return</button>
                </a>
            </div>
            <div class="logo-container">
                <a href="../index.php"><img class="logo center" src="../images/flashfoods-logo.png" alt="logo-flashfood"></a>
            </div>
            <div id="title-container">
                <a href="#">
                    <button id="title-button">About us</button>
                </a>
            </div>
        </div>

        <div id="content-container" class="main">
            <div class="main-content">
                <img src="../images/about-us-work.jpg" alt="three young entrepreneurs working" class="main-img">
                <div class="text-content">
                    <p><span class="bold">Flashfoods</span> was born from the collaborative efforts of three young students:
                        Cristian Oraña, Pau Carrera, and Alex Rodríguez. What began as a classroom project in 2023 has swiftly
                        evolved into a burgeoning startup, driven by a shared passion for innovation and technology.</p>
                    <p>At Flashfoods, our mission is simple yet transformative: to revolutionize the way people <span class="bold">discover the latest deals and offerings in their local food scene</span>. We've created an interactive map that not only showcases the freshest deals but also highlights a diverse array of fast-food joints and, soon, restaurants of all kinds.</p>
                    <p>By harnessing the power of technology, Flashfoods serves as a dynamic platform, connecting hungry customers with exciting culinary experiences while simultaneously spotlighting the vibrant tapestry of eateries in every neighborhood. Whether you're craving a quick bite or embarking on a gastronomic adventure, Flashfoods is your gateway to culinary exploration.</p>
                    <p class="join-us">Join us as we redefine the dining landscape, one delicious discovery at a time.</p>
                </div>
            </div>
            <h3 id="slick-carousel-title">Affiliations</h3>
            <?php $showAffiliations->showAffiliationsLogo(); ?>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.affiliations-slider').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
            });
        });
    </script>
    <script src="../js/main.js" defer></script>
</body>
</html>
