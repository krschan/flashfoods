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
    <link rel="stylesheet" href="/src/assets/css/style.css">
    <link rel="stylesheet" href="/src/assets/css/index.css">
    <title>FlashFood | home</title>
</head>

<body id="map-body">
    <!-- Aside -->
    <?php require_once 'aside.php';?>

    <aside id="menu-content-tablet">
        <button><img src="/src/assets/img/hamburger-menu.png" alt="hamburger-menu"></button>
    </aside>

    <aside id="menu-login" class="aligned">
        <div class="center">
            <?php
                if ($_SESSION["admin"] == true) {
                    ?>
                        <p>Bienvenido Admin <?php echo $_SESSION["username"]?>!</p>
                        <img id="profile-picture" src="<?php echo $_SESSION["image"]?>" alt="profile-picture">
                    <?php
                } else {
                    ?>
                        <p>Bienvenido <?php echo $_SESSION["username"]?></p>
                    <?php
                }
            ?>
        </div>

        <div class="center">
            <a href="/src/pages/view/menu/index.html"><button>Sign out</button></a>
        </div>
    </aside>

        <div id="signout">
            <form action="/src/pages/controller/UserController.php" method="post">
                <input type="submit" name="logout" value="Sign out">
            </form>
        </div>

    <div class="aligned left">
    </div>

    <div class="search-box aligned">
        <div id="search-right">
            <button><img src="/src/assets/img/brands/mcdonalds.png" alt="mcdonalds"></button>
            <button><img src="/src/assets/img/brands/burger-king.png" alt="burger-king"></button>
            <button><img src="/src/assets/img/brands/kfc.png" alt="kfc"></button>
            <button><img src="/src/assets/img/brands/taco-bell.png" alt="taco-bell"></button>
            <button><a href="/src/pages/index-user-tablet.html"><img src="/src/assets/img/lupa.png" alt="search-restaurant"></a></button>
        </div>
    </div>

    <div class="aligned right">
        <!-- Search -->
        <div class="aligned center" id="search-bar">
            <input type="text" name="search" id="search">
        </div>

        <!-- Filters -->
        <div class="aligned center" id="filters">
            <div class="aligned">
                <button>PIZZA</button>
            </div>

            <div class="aligned">
                <button>BURGER</button>
            </div>

            <div class="aligned">
                <button>RAMEN</button>
            </div>

            <div class="aligned">
                <button>PASTA</button>
            </div>
        </div>
    </div>

    <!-- Logo + Zoom -->
    <footer>
        <div class="zoom">
            <div class="aligned">
                <button>+</button>
            </div>
            <div class="aligned">
                <button>-</button>
            </div>
        </div>
    </footer>

    <!-- Cookies -->
    <div class="cookies">
        <div class="aligned cookies-text">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia ducimus ipsa voluptates? Sapiente
                suscipit praesentium, obcaecati ducimus quibusdam pariatur blanditiis saepe tenetur, eos totam sunt
                illo rem animi sequi debitis!</p>
        </div>
        <div class="aligned cookies-button">
            <button class="button-accept">ACEPTAR</button>
            <a href="/src/pages/menu/cookies.html"><button>LEER MÁS COOKIES</button></a>
        </div>
    </div>

</body>

</html>
