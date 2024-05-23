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
        $user->updateAccount($username, $email, $nameSurname, $birthDate, $phoneNumber);
    } elseif (isset($_POST["change_password"])) {
        $user->changePassword($_SESSION["username"], $oldPassword, $newPassword, $confirmNewPassword);
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
        $stmt = $this->conn->prepare("SELECT admin, image, mail, password FROM user WHERE username=:username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $result['password'];

            if (password_verify($password, $hashedPassword)) {
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

            // hash password
            $options = [
                'cost' => 12
            ];

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

            $stmt->bindParam(":mail", $mail);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->bindParam(":admin", $admin);

            // execute the statement
            if ($stmt->execute()) {
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["admin"] = false;
                $_SESSION["mail"] = $mail;
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
            // hash password
            $options = [
                'cost' => 12
            ];

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

            try {
                // insert in the database
                $stmt = $this->conn->prepare("INSERT INTO user (mail, username, password, image, admin) VALUES (:mail, :username, :password, :image, :admin)");

                $stmt->bindParam(":mail", $mail);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $hashedPassword);
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
        } else {
            $_SESSION["error"] = "Please insert a profile picture.";
            header("Location: ../auth/register-admin.php");
            exit();
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
            // delete in the database
            $stmt = $this->conn->prepare("DELETE FROM user WHERE username = :username");
            $stmt->bindParam(":username", $username);

            // execute the statement
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
        $username = $_SESSION["username"];
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $nameSurname = $_POST['nameSurname'];
        $birthDate = $_POST['birthDate'];
        $phoneNumber = $_POST['phoneNumber'];

        $currentUsername = $_SESSION['username'];
        $currentEmail = $_SESSION['mail'];

        try {
            // update in the database
            $stmt = $this->conn->prepare("UPDATE user SET username = :username, mail = :email, name = :nameSurname, birth_date = :birthDate, phone_number = :phoneNumber WHERE username = :currentUsername");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $currentEmail);
            $stmt->bindParam(":nameSurname", $nameSurname);
            $stmt->bindParam(":birthDate", $birthDate);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":currentUsername", $currentUsername);

            // execute the statement
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

    // update password
    public function changePassword($username, $oldPassword, $newPassword, $confirmNewPassword): void
    {
        $oldPassword = $_POST['old-password'];
        $newPassword = $_POST['new-password'];
        $confirmNewPassword = $_POST['confirm-new-password'];

        // compares if the password match
        if ($newPassword !== $confirmNewPassword) {
            $_SESSION["error"] = "New password and confirm password do not match.";
            header("Location: ../auth/change-password.php");
            exit();
        }

        // execute the statement
        try {
            $stmt = $this->conn->prepare("SELECT password FROM user WHERE username=:username AND password=:password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $oldPassword);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $stmt = $this->conn->prepare("UPDATE user SET password = :newPassword WHERE username = :username");
                $stmt->bindParam(":newPassword", $newPassword);
                $stmt->bindParam(":username", $username);

                // execute the statement
                if ($stmt->execute()) {
                    $_SESSION["success"] = "Password updated successfully.";
                    header("Location: ../index.php");
                    exit();
                } else {
                    $_SESSION["error"] = "Error updating password.";
                    header("Location: ../auth/change-password.php");
                    exit();
                }
            } else {
                $_SESSION["error"] = "Invalid old password. Please try again.";
                header("Location: ../auth/change-password.php");
                exit();
            }
            // invalid old password
        } catch (PDOException $e) {
            $_SESSION["error"] = "Error changing password: " . $e->getMessage();
            header("Location: ../auth/change-password.php");
            exit();
        }
    }

}
