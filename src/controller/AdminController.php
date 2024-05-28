    <?php
    session_start();

    $admin = new AdminController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["create_affiliation"])) {
            $admin->createAffiliation();
            // } elseif (isset($_POST["update_account"])) {
            //     $admin->updateAffiliation();
        } elseif (isset($_POST["change_password"])) {
            $admin->deleteAffiliation($_SESSION["username"], $oldPassword, $newPassword, $confirmNewPassword);
        } elseif (isset($_POST["show_affiliations"])) {
            $admin->showAffiliation();
        } elseif (isset($_POST["update_affiliation"])) {
            $admin->updateAffiliation($name, $phoneNumber, $mail, $description);
        } elseif (isset($_POST["edit_affiliation"])) {
            $admin->editAffiliation($name, $phoneNumber, $mail, $description);
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

        public function showAffiliation(): void
        {
            header("Location: ../view/list-affiliations.php");
            exit();
        }

        public function getAffiliations(): PDOStatement
        {
            $sql = "SELECT id_affiliation, name, phone_number, mail, description, image 
                FROM affiliation";
            return $this->conn->query($sql);
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


        // delete affiliation
        public function deleteAffiliation($admin): void
        {
            try {
                // delete in the database
                $stmt = $this->conn->prepare("DELETE FROM admin WHERE name = :admin OR phone_number = :admin OR email = :admin OR description = :admin");
                $stmt->bindParam(":admin", $admin);
                $stmt->bindParam(":phone_number", $phoneNumber);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":description", $description);

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

        // update affiliation
        public function updateAffiliation($name, $phoneNumber, $mail, $description): void
        {
            $currentAffiliation = $_SESSION['nameAffiliation'];

            try {
                // Actualizar en la base de datos
                $stmt = $this->conn->prepare("UPDATE affiliation SET name = :name, phone_number = :phone_number, mail = :mail, description = :description WHERE name = :currentAffiliation");
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":phone_number", $phoneNumber);
                $stmt->bindParam(":mail", $mail);
                $stmt->bindParam(":description", $description);
                $stmt->bindParam(":currentAffiliation", $currentAffiliation);

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    // Actualizar las variables de sesión con los nuevos valores
                    $_SESSION['nameAffiliation'] = $name;
                    $_SESSION['phoneAffiliation'] = $phoneNumber;
                    $_SESSION['mailAffiliation'] = $mail;
                    $_SESSION['descriptionAffiliation'] = $description;
                    header("Location: ../view/list-affiliations.php");
                    exit();
                } else {
                    $_SESSION["error"] = "Error al actualizar la información de la afiliación.";
                    header("Location: ../view/list-affiliations.php");
                    exit();
                }
            } catch (PDOException $e) {
                $_SESSION["error"] = "Error al actualizar la información de la afiliación: " . $e->getMessage();
                header("Location: ../view/list-affiliations.php");
                exit();
            }
        }

        // edit affiliation
        public function editAffiliation(): void
        {
            $currentAffiliation = "McDonalds";

            //Seleccionar en la base de datos
            $stmt = $this->conn->prepare("SELECT name, phone_number, mail, description, image FROM affiliation WHERE name = :currentAffiliation");
            $stmt->bindParam(":currentAffiliation", $currentAffiliation);
            $stmt->execute();

            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $_SESSION["nameAffiliation"] = $result["name"];
                $_SESSION["phoneAffiliation"] = $result["phoneNumber"];
                $_SESSION["mailAffiliation"] = $result["mail"];
                $_SESSION["descriptionAffiliation"] = $result["description"];
                exit();
            } else {
                // authentication failed, display an error message 
                $_SESSION["error"] = "Invalid username or password. Please try again.";
                header("Location: ../auth/login.php");
                exit();
            }
        }
    }
