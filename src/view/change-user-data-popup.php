<?php session_start(); ?>

<div class="info-box center">
    <div class="info-form aligned">
        <h2>Account Information</h2>
        <article id="user-information">
            <div class="img">
                <div class="img">
                    <?php if (isset($_SESSION['image']) && !empty($_SESSION['image'])): ?>
                        <img class="user-img" src="model/<?php echo $_SESSION['image']; ?>" alt="profile-image" />
                    <?php else: ?>
                        <img class="user-img" src="model/user-img.jpg" alt="profile-image" />
                    <?php endif; ?>
                </div>
            </div>
            <form id="information" method="POST" action="controller/UserController.php">
                <label for="username">Username</label>
                <input type="text" id="user" name="username" value="<?php echo $_SESSION['username']; ?>" disabled />

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['mail']; ?>" disabled />

                <input type="hidden" name="current_username" value="<?php echo getUserData('username'); ?>">
                <input type="hidden" name="current_email" value="<?php echo getUserData('mail'); ?>">

                <label for="name-surname">Name</label>
                <input type="text" id="nameSurname" name="nameSurname" value="<?php echo getUserData('name'); ?>" />

                <label for="birth-date">Birth Date</label>
                <input type="text" id="birthDate" name="birthDate" value="<?php echo getUserData('birth_date'); ?>" />

                <label for="phone-number">Phone Number</label>
                <input type="text" id="phoneNumber" name="phoneNumber"
                    value="<?php echo getUserData('phone_number'); ?>" />

                <?php
                if (isset($_SESSION['error'])) {
                    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']);
                }
                ?>
                <div id="validation-message"></div>
                <button type=submit name="update_account" class="normal-button">Save changes (PHP)</button>
                <button type=submit name="update_account" class="normal-button" id="update-ajax-button">Save changes (AJAX)</button>
                <button type=button name="change_password" class="normal-button"><a id="change-password-button"
                        href="/src/auth/change-password.php">Change password</a></button>
                <button type=submit name="delete_account" class="red-button">DELETE ACCOUNT</button>
            </form>

        </article>
    </div>
</div>

<?php
function getUserData($field)
{
    // database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flashfood";

    try {
        // database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // statement to select the specified field
        $stmt = $conn->prepare("SELECT $field FROM user WHERE username = :username");

        // bind the username parameter
        $stmt->bindParam(':username', $_SESSION['username']);
        $stmt->execute();

        // execute the statement
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $conn = null;

        // if a result is found, return the value of the specified field
        if ($result) {
            return $result[$field];
        } else {
            // if is not found, return an empty string
            return "";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>