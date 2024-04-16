<?php
if (isset($_SESSION['logged']) == true){
    echo '
    <button id="menu-toggle">Show menu</button>
    
    <aside id="menu-content" class="aligned menu-hidden">
        <div class="right">
            <button id="menu-close">X</button>
        </div>
        <div class="center">
            <a href="/src/pages/view/menu/index.php">
                <button><img src="/src/assets/img/logo.png" alt="logo-home-page"></button>
            </a>
        </div>
        <ul>
            <li><a href="/src/pages/view/aside/information.php"><button>Information account</button></a></li>
            <li><a href="/src/pages/view/aside/addresses.php"><button>Addresses</button></a></li>
            <li><a href="/src/pages/view/aside/history.php"><button>History</button></a></li>
            <li><a href="/src/pages/view/aside/planning.php"><button>Planning</button></a></li>
            <li><a href="/src/pages/view/aside/discount-coupons.php"><button>Discount coupons</button></a></li>
            <li><a href="/src/pages/view/aside/wishlist.php"><button>Wishlist</button></a></li>
            <li><a href="/src/pages/view/aside/myalerts.php"><button>My alerts</button></a></li>';
            if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true && $_SESSION["admin"] == true){
                echo '<li><a href="/src/pages/view/aside/admin.php"><button>Admin</button></a></li>';
            }
            echo '<li><a href="/src/pages/view/aside/technical-support.php"><button>Technical support</button></a></li>
        </ul>
    </aside>';
} else {
    echo '
    <button id="menu-toggle">Show menu</button>

    <aside id="menu-content" class="aligned menu-hidden">
        <div class="right">
            <button id="menu-close">X</button>
        </div>
        <div class="center">
            <a href="/src/pages/view/menu/index.php">
                <button><img src="/src/assets/img/logo.png" alt="logo-home-page"></button>
            </a>
        </div>
        <ul>
            <li class="content-locked"><a href="#"><button>Information account</button></a></li>
            <li class="content-locked"><a href="#"><button>Addresses</button></a></li>
            <li class="content-locked"><a href="#"><button>History</button></a></li>
            <li class="content-locked"><a href="#"><button>Planning</button></a></li>
            <li class="content-locked"><a href="#"><button>Discount coupons</button></a></li>
            <li class="content-locked"><a href="#"><button>Wishlist</button></a></li>
            <li class="content-locked"><a href="#"><button>My alerts</button></a></li>
            <li><a href="/src/pages/view/aside/technical-support.php"><button>Technical support</button></a></li>
        </ul>
    </aside>';
};
?>
