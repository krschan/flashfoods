<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlashFood | Admin</title>

    <link rel="icon" type="image/png" href="../src/images/flashfoods-logo-f.png">

    <!-- jQuery -->
    <script src="/src/js/jquery-3.7.1.min.js"></script>
    <script src="/src/js/slick-1.8.1/slick/slick.js"></script>
    <script src="/src/js/dist/jquery.validate.js"></script>
    <script src="/src/js/dist/additional-methods.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>
<body id="body-background">
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
        <button id="title-button">Admin Menu</button>
      </a>
    </div>

  </div>

  <div id="content-container" class="main">
    <div class="main-content">
    <div>
        <form id="formAdmin">
    <label for="name">Name: </label> <br>
    <input type="text" id="name" require> <br>

    <label for="phone">Phone Number: </label> <br>
    <input type="text" id="phone">  <br>

    <label for="email">Mail:</label> <br>
    <input type="mail" id="email"> <br>

    <label for="Description">Description:</label> <br>
    <textarea id="Description"></textarea> <br>

    <input type="submit" value="Submit" id="submit">
        </form>
    </div>
 </div>
</div>
<script src="/src/js/main.js" defer></script>
</body>
</html>