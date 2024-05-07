<?php
session_start();

// check if form is submitted
$user = new UserController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $user->login();
    } elseif (isset($_POST["logout"])) {
        $user->logout();
    } elseif (isset($_POST["register"])) {
        $user->register();
    } elseif (isset($_POST["register-admin"])) {
        $user->registerAdmin();
    } elseif (isset($_POST["delete_account"])) {
        $user->deleteAccount($_SESSION["username"]);
    } elseif (isset($_POST["update_account"])) {
        $username = $_SESSION["username"];
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $nameSurname = $_POST['nameSurname'];
        $birthDate = $_POST['birthDate'];
        $phoneNumber = $_POST['phoneNumber'];

        $user->updateAccount($username, $email, $nameSurname, $birthDate, $phoneNumber);
    }
}

class UserController
{
    private $conn;

    public function __construct()
    {
        // database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $flashfood = "flashfood";

        // create connection
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$flashfood", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function login(): void
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // validate username and password here
        /*
        if (!ctype_alpha($username)) {
            $_SESSION["error"] = "The username can only contain letters.";
            header("Location: ../auth/login.php");
            exit();
        }

        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
            $_SESSION["error"] = "The password must be at least 8 characters long and contain at least one uppercase letter.";
            header("Location: ../auth/login.php");
            exit();
        }
        */
        // check in the database
        $stmt = $this->conn->prepare("SELECT admin, image, mail FROM user WHERE username=:username AND password=:password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // authentication successful
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["admin"] = ($result['admin'] == 1);
            $_SESSION["image"] = $result['image'];

            // Set the email in session
            $_SESSION["mail"] = $result['mail'];

            header("Location: ../index.php");
            exit();
        } else {
            // authentication failed, display an error message 
            $_SESSION["error"] = "Invalid username or password. Please try again.";
            header("Location: ../auth/login.php");
            exit();
        }
    }

    // register user
    public function register(): void
    {
        $mail = $_POST['mail'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admin = 0;

        // validate username and password here
        /*
        if (!ctype_alpha($username)) {
            $_SESSION["error"] = "The username can only contain letters.";
            header("Location: ../auth/register.php");
            exit();
        }

        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
            $_SESSION["error"] = "The password must be at least 8 characters long and contain at least one uppercase letter.";
            header("Location: ../auth/register.php");
            exit();
        }
        */
        try {
            // insert in the database
            $stmt = $this->conn->prepare("INSERT INTO user (mail, username, password, admin) VALUES (:mail, :username, :password, :admin)");
            $stmt->bindParam(":mail", $mail);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":admin", $admin);

            // execute the statement
            if ($stmt->execute()) {
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["admin"] = false;
                header("Location: ../index.php");
                exit();
            } else {
                echo "Error registering the user.";
            }
        } catch (PDOException $e) {
            // authentication failed, display an error message
            $_SESSION["error"] = "Invalid username or password. Please try again.";
            header("Location: ../auth/register.php");
            exit();
        }
    }

    // register user admin
    public function registerAdmin(): void
    {
        $mail = $_POST['mail'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admin = 1;

        // validate username and password here
        /*
        if (!ctype_alpha($username)) {
            $_SESSION["logged"] = false;
            $_SESSION["error"] = "The username can only contain letters.";
            header("Location: ../auth/register-admin.php");
            exit();
        }

        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
            $_SESSION["logged"] = false;
            $_SESSION["error"] = "The password must be at least 8 characters long and contain at least one uppercase letter.";
            header("Location: ../auth/register-admin.php");
            exit();
        }
        */
        // path file to uploads
        $location = "../model/";

        // filename without the path
        $filename = basename($_FILES["fileUpload"]["name"]);

        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $location . $filename)) {
            $_SESSION["done"] = "The file was sent to another folder.";
        } else {
            $_SESSION["error"] = "The file you have entered had some errors. Try again.";
        }

        try {
            // insert in the database
            $stmt = $this->conn->prepare("INSERT INTO user (mail, username, password, image, admin) VALUES (:mail, :username, :password, :image, :admin)");

            $stmt->bindParam(":mail", $mail);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":image", $filename);
            $stmt->bindParam(":admin", $admin);

            // execute the statement
            if ($stmt->execute()) {
                $_SESSION["mail"] = $mail;
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["admin"] = true;
                $_SESSION["image"] = $filename;
                header("Location: ../index.php");
                exit();
            } else {
                echo "Error registering the user.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function logout(): void
    {
        unset($_SESSION["admin"]);
        unset($_SESSION["image"]);
        unset($_SESSION["logged"]);

        session_destroy();

        header("Location: ../index.php");
        exit();
    }

    // delete user
    public function deleteAccount($username): void
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM user WHERE username = :username");
            $stmt->bindParam(":username", $username);

            if ($stmt->execute()) {
                session_destroy();
                header("Location: ../index.php");
                exit();
            } else {
                $_SESSION["error"] = "Error deleting the account.";
                header("Location: ../index.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION["error"] = "Error deleting the account: " . $e->getMessage();
            header("Location: ../index.php");
            exit();
        }
    }

    // update user
    public function updateAccount($username, $email, $nameSurname, $birthDate, $phoneNumber): void
    {
        $currentUsername = $_SESSION['username'];
        $currentEmail = $_SESSION['mail'];

        // Verificar si se realizaron cambios
        if ($username === $currentUsername && $email === $currentEmail) {
            $_SESSION["error"] = "No changes were made.";
            header("Location: ../index.php");
            exit();
        }

        try {
            $stmt = $this->conn->prepare("UPDATE user SET username = :username, mail = :email, name = :nameSurname, birth_date = :birthDate, phone_number = :phoneNumber WHERE username = :currentUsername");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $currentEmail);
            $stmt->bindParam(":nameSurname", $nameSurname);
            $stmt->bindParam(":birthDate", $birthDate);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":currentUsername", $currentUsername);

            if ($stmt->execute()) {
                header("Location: ../index.php");
                exit();
            } else {
                $_SESSION["error"] = "Error updating user information.";
                header("Location: ../index.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION["error"] = "Error updating user information: " . $e->getMessage();
            header("Location: ../index.php");
            exit();
        }
    }

}
?>