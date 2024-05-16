<?php
session_start();

$admin = new AdminController();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create_affiliation"])) {
        $admin->createAffiliation();
    // } elseif (isset($_POST["update_account"])) {
    //     $admin->updateAffiliation();
    } elseif (isset($_POST["change_password"])) {
        $admin->deleteAffiliation($_SESSION["username"], $oldPassword, $newPassword, $confirmNewPassword);
    }
}


class AdminController 
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

    // create account
    public function createAffiliation(): void
    {

        // validate user selected a file
        // if (!isset($_FILES["fileUpload"]) || $_FILES["fileUpload"]["error"] == UPLOAD_ERR_NO_FILE) {
        //     $_SESSION["error"] = "No se ha seleccionado ningún archivo.";
        //     header("Location: ../index.php");
        //     exit();
        // }

        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $phoneNumber = $_POST['phoneNumber'];
        $description = $_POST['description'];

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
            $stmt = $this->conn->prepare("INSERT INTO affiliation (name, phone_number, mail, description, image) VALUES (:name, :phone_number, :mail, :description, :image)");

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":mail", $mail);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":image", $filename);

            // execute the statement
            if ($stmt->execute()) {
                $_SESSION["logged"] = true;
                $_SESSION["nameAffiliation"] = $name;
                $_SESSION["imageAffiliation"] = $filename;
                echo $_SESSION["imageAffiliation"];
                header("Location: ../index.php");
                exit();
            } else {
                echo "Error creating the affiliation.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    // update account
    // public function updateAffiliation($username, $email, $nameSurname, $birthDate, $phoneNumber): void
    // {
    //     $username = $_SESSION["username"];
    //     $email = isset($_POST['email']) ? $_POST['email'] : '';
    //     $phoneNumber = $_POST['phoneNumber'];

    //     $currentUsername = $_SESSION['username'];
    //     $currentEmail = $_SESSION['mail'];

    //     try {
    //         // update in the database
    //         $stmt = $this->conn->prepare("UPDATE user SET username = :username, mail = :email, phone_number = :phoneNumber WHERE username = :currentUsername");
    //         $stmt->bindParam(":username", $username);
    //         $stmt->bindParam(":email", $currentEmail);
    //         $stmt->bindParam(":nameSurname", $nameSurname);
    //         $stmt->bindParam(":birthDate", $birthDate);
    //         $stmt->bindParam(":phoneNumber", $phoneNumber);
    //         $stmt->bindParam(":currentUsername", $currentUsername);

    //         // execute the statement
    //         if ($stmt->execute()) {
    //             header("Location: ../index.php");
    //             exit();
    //         } else {
    //             $_SESSION["error"] = "Error updating user information.";
    //             header("Location: ../index.php");
    //             exit();
    //         }
    //     } catch (PDOException $e) {
    //         $_SESSION["error"] = "Error updating user information: " . $e->getMessage();
    //         header("Location: ../index.php");
    //         exit();
    //     }
    // }

    // delete admin

    public function deleteAffiliation($admin): void  {
        try {
            // delete in the database
            $stmt = $this->conn->prepare("DELETE FROM admin WHERE name = :name OR phoneNumber = ,:phoneNumber OR email = :email OR description = :description");
            $stmt->bindParam(":name", $admin);
            $stmt->bindParam(":phoneNumber",$phoneNumber);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":description",$description);
    
            // execute the statement
            if ($stmt->execute()) {
                session_destroy();
                header("Location: ../index.php");
                exit();
            } else {
                $_SESSION["error"] = "Error deleting the admin.";
                header("Location: ../index.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION["error"] = "Error deleting the admin: " . $e->getMessage();
            header("Location: ../index.php");
            exit();
        }
    }
}
?>
