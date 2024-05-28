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
  <title>FlashFood | Register</title>
  <link rel="icon" type="image/png" href="../images/flashfoods-logo-f.png">

  <!-- css -->
  <link rel="stylesheet" href="../css/login-register-admin-support.css">

  <!-- jQuery -->
  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/dist/jquery.validate.js"></script>
  <script src="../js/dist/additional-methods.js"></script>
</head>

<body id="grey-background" class="center">
  <div class="return">
    <a href="../index.php">
      <button>Return</button>
    </a>
  </div>

  <div id="white-background">
    <div class="div-logo">
      <a href="../index.php"><img class="logo center" src="../images/flashfoods-logo.png" alt="logo-flashfood"></a>
    </div>

    <div id="div-title">
      <a href="login.php">
        <button id="sign-button">Log-in</button>
      </a>
      <a href="#">
        <button id="sign-button-selected">Sign-up</button>
      </a>
      <a href="register-admin.php">
        <button id="sign-button">Sign-up Admin</button>
      </a>
    </div>
  </div>

  <form action="../controller/UserController.php" method="post" id="register" enctype="multipart/form-data">

    <div id="main-div" class="aligned main">
      <div class="center">
        <button>
          <img class="signin-faster" src="../images/google-icon.png" alt="sign-in-with-google">
        </button>
        <button>
          <img class="signin-faster" src="../images/apple-icon.png" alt="sign-in-with-apple">
        </button>
        <button>
          <img class="signin-faster" src="../images/mail-icon.png" alt="sign-in-with-mail">
        </button>
      </div>

      <div>
        <label for="email">Email</label>
        <div>
          <input type="email" name="mail">
        </div>
      </div>
      <div id="validation-message" style="display : none"></div>

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
          <a id="support" href="../view/technical-support.php">Forgot password or having
            trouble?</a>
        </div>
      </div>

      <input type="submit" name="register" value="Create account" class="signin-input">
      <?php
      if (isset($_SESSION['error'])) {
        echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
      }

      ?>
      <div id="request-validation"></div>
    </div>
  </form>
  <script src="../js/main.js" defer></script>
  <script src="../js/ajax-email-validator.js" defer></script>
</body>

</html>