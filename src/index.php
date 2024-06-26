<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- test -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Flash Food gives you the best offers and discounts near you." />
  <meta name="generator" content="FlashFood">
  <title>FlashFoods | Home</title>
  <link rel="icon" type="image/png" href="../src/images/flashfoods-logo-f.png">

  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/f527bb26f1.js" crossorigin="anonymous"></script>

  <!-- jQuery -->
  <script src="/src/js/jquery-3.7.1.min.js"></script>
  <script src="/src/js/slick-1.8.1/slick/slick.js"></script>
  <script src="/src/js/dist/jquery.validate.js"></script>
  <script src="/src/js/dist/additional-methods.js"></script>

  <!-- css -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php require_once 'view/nav.php'; ?>
  <div class="overlay"></div>
  <div class="main">
    <div class="search-and-filter-container">
      <div class="search-box">
        <div class="row">
          <input type="text" id="input-search-box" placeholder="Search in FlashFoods" autocomplete="off">
          <button id="button-search-box"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="result-box"></div>
      </div>
      <div class="filter-container">
        <div class="filter"><i class="fa-solid fa-money-bill-1-wave" style="color: #000000;"></i><span class="filter-text">Price</span><i class="fa-solid fa-caret-down" style="color: #000000;"></i></div>
        <div class="filter"><i class="fa-solid fa-star" style="color: #000000;"></i><span class="filter-text">Rating</span><i class="fa-solid fa-caret-down" style="color: #000000;"></i></div>
        <div class="filter"><i class="fa-solid fa-utensils" style="color: #000000;"></i><span class="filter-text">Cuisine</span><i class="fa-solid fa-caret-down" style="color: #000000;"></i></div>
        <div class="filter"><i class="fa-solid fa-calendar-days" style="color: #000000;"></i><span class="filter-text">Schedule</span><i class="fa-solid fa-caret-down" style="color: #000000;"></i></div>
        <div class="filter"><i class="fa-solid fa-chevron-filter" style="color: #000000;"></i><span class="filter-text">All filters</span><i class="fa-solid fa-caret-down" style="color: #000000;"></i></div>
      </div>
    </div>
    <?php
    if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
      echo
        '<div class="login-button">  
          <a href="../src/controller/UserController.php" onclick="event.preventDefault(); document.getElementById(\'logout-form\').submit();">
            <span>Log out</span>
          </a>
          <form id="logout-form" action="../src/controller/UserController.php" method="post" style="display: none;">
            <input type="hidden" name="logout" value="1">
          </form>
      </div>';
    } else {
      echo
        '<div class="login-button">
            <a href="auth/login.php">
              <span>Log in</span>
            </a>
          </div>';
    }

    echo
      '<div class="cookies-restart">
            
        </div>';
    ?>

    <main class="content">
      <div id="popup" class="popup">
        <div class="popup-content"></div>
      </div>
      <div class="map-container">
        <i class="fa-solid fa-location-dot map-marker"></i>
      </div>
      <div id="markersDiv" class="markers">
        <i id="mcdonalds1" class="fa-solid fa-location-dot mcdonalds-marker"></i>
        <i id="mcdonalds2" class="fa-solid fa-location-dot mcdonalds-marker"></i>
        <i id="mcdonalds3" class="fa-solid fa-location-dot mcdonalds-marker"></i>
      </div>
    </main>

    <footer>
      <!-- Cookies -->
      <div id="cookies">

        <div class="cookies-text">
          <p>We use cookies to improve your experience on our website and provide you with the best deals on fast food.
            By browsing Flash Foods, you accept our use of cookies.</p>
        </div>

        <div class="cookies-buttons">
          <div>
            <button class="check cookies-accept">ACCEPT</button>
          </div>
          <div>
            <a href="/src/view/cookies.php"><button class="check cookies-readmore">READ MORE ABOUT COOKIES</button></a>
          </div>

          <div>
            <button class="cookies-close">&times;</button>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <!-- js -->
  <script src="js/main.js" defer></script>
  <script src="js/popups.js"></script>
  <script src="js/search.js"></script>
  <script src="js/ajax-update-user.js"></script>


</body>

</html>