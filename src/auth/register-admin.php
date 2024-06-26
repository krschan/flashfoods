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
  <link rel="stylesheet" href="../css/default-page.css">

  <!-- jQuery -->
  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/dist/jquery.validate.js"></script>
  <script src="../js/dist/additional-methods.js"></script>
</head>

<body id="grey-background" class="center">
  <div id="white-background">
    <div class="div-logo">
      <a href="../index.php"><img class="logo center" src="../images/flashfoods-logo.png" alt="logo-flashfood"></a>
    </div>

    <div id="div-title">
      <a href="login.php">
        <button id="sign-button">Log-in</button>
      </a>
      <a href="register.php">
        <button id="sign-button">Sign-up</button>
      </a>
      <a href="#">
        <button id="sign-button-selected">Sign-up Admin</button>
      </a>
    </div>
  </div>

  <form action="../controller/UserController.php" method="post" enctype="multipart/form-data" id="register-admin">

    <div id="main-div" class="aligned main">
      <div>
        <label for="email">Email</label>
        <div>
          <input type="text" name="mail">
          <div id="validation-message" style="display : none"></div>
        </div>
      </div>

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

      </div>

      <div>
        <label for="image">Upload Profile Picture</label>
        <input type="file" name="fileUpload" id="fileUpload">
      </div>

      <input type="submit" name="register-admin" value="Create account" class="signin-input">
      <a href="../index.php">
        <input type="button" name="register" value="Back to home" class="signin-input">
      </a> </a></input>
      <div id="request-validation"></div>
    </div>
  </form>
  <script src="../js/main.js" defer></script>
  <script src="../js/ajax-email-validator.js" defer></script>
</body>

</html>