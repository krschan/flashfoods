<?php

if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true && $_SESSION["admin"] == true) {
    echo '
    <aside id="menu-login" class="aligned">
        <div class="center">';
        echo '
            <p>Bienvenido Admin ' . $_SESSION["username"] . '!</p>
            <img id="profile-picture" src="' . $_SESSION["image"] . '" alt="profile-picture">';
    } 

    echo '
        </div>';
    
    require_once '../login/login-signout.php';

    echo '
    </aside>';
?>
