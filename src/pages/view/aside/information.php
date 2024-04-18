<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Information</title>
    <link rel="stylesheet" href="/src/assets/css/information.css" />
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

    <div class="info-box center">
        <div class="info-form aligned">
            <h2>Account Information</h2>
            <article id="user-information">
                <div class="img">
                    <img class="user-img" src="/src/assets/img/user.png" alt="profile-image" />
                </div>
                <form id="information">
                    <label for="username">Username</label><br />
                    <input type="text" id="user" name="username" placeholder="username" /><br />

                    <label for="name-surname">Name and Surname</label><br />
                    <input type="text" id="nameSurname" name="nameSurname" placeholder="name surname1 surname2" /><br />

                    <label for="email">Email</label><br />
                    <input type="email" id="email" name="email" placeholder="email" /><br />

                    <label for="birth-date">Birth Date</label><br />
                    <input type="date" id="birthDate" name="birthDate" /><br />

                    <label for="phone-number">Phone Number</label><br />
                    <input type="tel" id="phoneNumberr" name="phoneNumberr" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" /><br />

                    <?php
                    if(isset($_SESSION['error'])) {
                        echo "<p style='color: red;'>".$_SESSION['error']."</p>";
                        unset($_SESSION['error']);
                    }
                    
                ?>
                    <button type=submit id="update-button">Update</button>
                    <button type=submit id="delete-button">Delete Account</button>

                </form>
            </article>
        </div>
    </div>
</body>

</html>
