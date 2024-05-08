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
    <title>FlashFood | Login</title>
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
            <a href="../index.php"><img class="logo center" src="../images/flashfoods-logo.png"
                    alt="logo-flashfood"></a>
        </div>

        <div id="div-title">
            <a href="#">
                <button id="sign-button-selected">Update password</button>
            </a>
        </div>
    </div>

    <form action="../controller/UserController.php" method="post" id="change_password">

        <div id="main-div" class="aligned main">
            <div>
                <label for="old-password">Old password</label>
                <div>
                    <input type="text" name="old-password">
                </div>
            </div>

            <div>
                <label for="new-password">New password</label>
                <div>
                    <input type="text" name="new-password">
                </div>
            </div>

            <div>
                <label for="confirm-new-password">Confirm new password</label>
                <div>
                    <input type="text" name="confirm-new-password">
                </div>
            </div>

            <input type="submit" name="change_password" value="Save changes" class="signin-input">
            <?php
            if (isset($_SESSION['error'])) {
                echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                unset($_SESSION['error']);
            }

            ?>

        </div>
    </form>
    <script src="../js/main.js" defer></script>
</body>

</html>