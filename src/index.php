<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FlashFoods | Home</title>

  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/f527bb26f1.js" crossorigin="anonymous"></script>
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
      <div class="login-button">
        <a href="auth/login.html">
          <span>Log in</span>
        </a>
      </div>
      
      <main class="content">
        <div id="popup" class="popup">
          <div class="popup-content"></div>
        </div>
      </main>

  	<footer>Footer</footer>
  </div>
</body>
  <!-- js -->
  <script src="js/main.js"></script>  
</html>
