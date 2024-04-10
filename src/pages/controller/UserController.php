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
    }
}
// test
class UserController {
    private $conn;

    public function __construct() {
        // database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $flashfood = "flashfood";

        // create connection
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$flashfood", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; // This message should not be echoed here in a production environment
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function login(): void {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Validate username and password here
        if (!ctype_alpha($username)) {
            $_SESSION["error"] = "The username can only contain letters.";
            header("Location: ../view/login/login.php");
            exit();
        }

        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
            $_SESSION["error"] = "The password must be at least 8 characters long and contain at least one uppercase letter.";
            header("Location: ../view/login/login.php");
            exit();
        }

        // Check in the database
        $stmt = $this->conn->prepare("SELECT admin, image FROM user WHERE username=:username AND password=:password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Authentication successful
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["admin"] = ($result['admin'] == 1);
            $_SESSION["image"] = $result['image'];

            header("Location: ../view/menu/index.php");
            exit();
        } else {
            // Authentication failed, display an error message
            $_SESSION["error"] = "Invalid username or password. Please try again.";
            header("Location: ../view/login/login.php");
            exit();
        }
    }

    // register user
    public function register():void {
        $mail = $_POST['mail'];
        $username = $_POST['user']; 
        $password = $_POST['password'];
        $admin = 0;

        if (!ctype_alpha($username)) {
            $_SESSION["logged"] = false;
            $_SESSION["error"] = "The username can only contain letters.";
            header("Location: ../view/login/login.php");
            exit();
        }

        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
            $_SESSION["logged"] = false;
            $_SESSION["error"] = "The password must be at least 8 characters long and contain at least one uppercase letter.";
            header("Location: ../view/login/login.php");
            exit();
        }

        $stmt = $this->conn->prepare("INSERT INTO user (mail, username, password, admin) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $mail, $username, $password, $admin); 
        
        if ($stmt->execute()) {

            $_SESSION["logged"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["admin"] = false;
            header("Location: ../view/login/index.php");
            exit();
    
        } else {
            echo "Error al registrar el usuario.";
        }
    }  

    // register user admin
    public function registerAdmin():void {
        $mail = $_POST['mail'];
        $username = $_POST['user']; 
        $password = $_POST['password'];
        $admin = 1;

        if (!ctype_alpha($username)) {
            $_SESSION["logged"] = false;
            $_SESSION["error"] = "The username can only contain letters.";
            header("Location: ../view/login/login.php");
            exit();
        }

        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
            $_SESSION["logged"] = false;
            $_SESSION["error"] = "The password must be at least 8 characters long and contain at least one uppercase letter.";
            header("Location: ../view/login/login.php");
            exit();
        }
        
        // Path file to uploads
        $location = "/src/pages/model/profile-picture/";
        
        // $filename = $_SERVER['DOCUMENT_ROOT'] . $location . basename($_FILES["fileUpload"]["name"]);
        $filename = $location . basename($_FILES["fileUpload"]["name"]);

        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $filename)){
            $_SESSION["done"] = "The file was sent to another folder.";
        } else {
            $_SESSION["error"] = "The file you have entered had some errors. Try again.";
        }

        $stmt = $this->conn->prepare("INSERT INTO user (mail, username, password, image, admin) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $mail, $username, $password, $filename, $admin); 
        
        if ($stmt->execute()) {

            $_SESSION["logged"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["admin"] = true;
            $_SESSION["image"] = $location . basename($_FILES["fileUpload"]["name"]);
            header("Location: ../view/login/index-user.php");
            exit();
    
        } else {
            echo "Error al registrar el usuario.";
        }
    }

    public function logout(): void {
        unset($_SESSION["admin"]);
        unset($_SESSION["image"]);
        unset($_SESSION["logged"]);

        session_destroy();

        header("Location: ../view/menu/index.php");
        exit();
    }
    public function update (): void {
        $mail = $_POST['mail'];
        $username = $_POST['user']; 
        $password = $_POST['password'];
        $admin = 0;

        if (!ctype_alpha($username)) {
            $_SESSION["logged"] = false;
            $_SESSION["error"] = "The username can only contain letters.";
            header("Location: ../view/login/login.php");
            exit();
        }

        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
            $_SESSION["logged"] = false;
            $_SESSION["error"] = "The password must be at least 8 characters long and contain at least one uppercase letter.";
            header("Location: ../view/login/login.php");
            exit();
        }

        $stmt = $this->conn->prepare("INSERT INTO user (mail, username, password, admin) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $mail, $username, $password, $admin); 
        
        if ($stmt->execute()) {

            $_SESSION["logged"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["admin"] = false;
            header("Location: ../view/menu/index.php");
            exit();
    
        } else {
            echo "Error al registrar el usuario.";
        }
    }
}

    ?>