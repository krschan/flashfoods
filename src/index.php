<!DOCTYPE html>
<html lang="en">
<head>
  <!-- test -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FlashFoods | Home</title>
  
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/f527bb26f1.js" crossorigin="anonymous"></script>
  
  <!-- jQuery -->
  <script src="/src/js/jquery-3.7.1.min.js"></script>
  <script src="/src/js/slick-1.8.1/slick/slick.js"></script>
  <script src="/src/js/dist/jquery.validate.js"></script>
  <script src="/src/js/dist/additional-methods.js"></script>

  <!-- js -->
  <script src="js/main.js" defer></script>  

  <!-- css -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include 'view/nav.php'; ?>  
  <div class="overlay"></div>
  <div class="main">
      <div class="search-box">
        <div class="row">
          <input type="text" id="input-box" placeholder="Search in FlashFoods" autocomplete="off">
          <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="result-box"></div>
      </div>

      <?php
        if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
          echo
          '<div class="sign-button">
            <form action="/src/controller/user-controller.php" method="post">
              <input type="submit" name="logout" value="Sign out">
            </form>
          </div>';
        } else {
          echo 
          '<div class="login-button">
            <a href="auth/login.html">
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
      </main>

    <footer>
      <!-- Cookies -->
      <div id="cookies">

          <div class="cookies-text">
            <p>We use cookies to improve your experience on our website and provide you with the best deals on fast food. By browsing Flash Foods, you accept our use of cookies.</p>
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
</body>
</html>
