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

                <label for="name-surname">Name and Surname</label>
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
                <button type=submit name="update_account" id="normal-button">Update</button>
                <button type=submit name="delete_account" id="red-button">DELETE ACCOUNT</button>
            </form>

        </article>
    </div>
</div>
<?php
function getUserData($field)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flashfood";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT $field FROM user WHERE username = :username");

        $stmt->bindParam(':username', $_SESSION['username']);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $conn = null;

        if ($result) {
            return $result[$field];
        } else {
            return "";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
