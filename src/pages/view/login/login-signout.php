<?php

if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
    echo 
    '<div id="signout">
        <form action="/src/pages/controller/UserController.php" method="post">
            <input type="submit" name="logout" value="Sign out">
        </form>
    </div>';
} else {
    echo '
    <div id="login">
        <a href="/src/pages/view/login/login.php">
            <button>Sign in</button>
        </a>
    </div>';
}

?>