<?php
session_start();

$admin = new AdminController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create_affiliation"])) {
        $admin->createAffiliation();
    } elseif (isset($_POST["delete_affiliation"])) {
        $admin->deleteAffiliation($id_affiliation);
    } elseif (isset($_POST["show_affiliations"])) {
        $admin->showAffiliation();
    } elseif (isset($_POST["update_affiliation"])) {
        $admin->updateAffiliation($name, $phoneNumber, $mail, $description);
    } elseif (isset($_POST["edit_affiliation"])) {
        $admin->editAffiliation($id_affiliation);
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

    public function createAffiliation(): void
    {
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $phoneNumber = $_POST['phoneNumber'];
        $description = $_POST['description'];

        $location = "../model/";
        $filename = basename($_FILES["fileUpload"]["name"]);

        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $location . $filename)) {
            $_SESSION["done"] = "The file was sent to another folder.";
        } else {
            $_SESSION["error"] = "The file you have entered had some errors. Try again.";
        }

        try {
            $stmt = $this->conn->prepare("INSERT INTO affiliation (name, phone_number, mail, description, image) VALUES (:name, :phone_number, :mail, :description, :image)");

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":mail", $mail);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":image", $filename);

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

    public function deleteAffiliation($id_affiliation): void
    {
        $id_affiliation = $_POST["id_affiliation"];

        try {
            $stmt = $this->conn->prepare("DELETE FROM affiliation WHERE id_affiliation = :id_affiliation");
            $stmt->bindParam(":id_affiliation", $id_affiliation);
            $stmt->execute();

            if ($stmt->execute()) {
                header("Location: ../view/list-affiliations.php");
                exit();
            } else {
                $_SESSION["error"] = "Error deleting the affiliation.";
                header("Location: ../view/list-affiliations.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION["error"] = "Error deleting the affiliation: " . $e->getMessage();
            header("Location: ../view/list-affiliations.php");
            exit();
        }
    }

    public function updateAffiliation($name, $phoneNumber, $mail, $description): void
    {
        $currentAffiliation = $_SESSION['nameAffiliation'];

        try {
            $stmt = $this->conn->prepare("UPDATE affiliation SET name = :name, phone_number = :phone_number, mail = :mail, description = :description WHERE name = :currentAffiliation");
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":mail", $mail);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":currentAffiliation", $currentAffiliation);

            if ($stmt->execute()) {
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

    public function editAffiliation($id_affiliation): void
    {
        $id_affiliation = $_POST["id_affiliation"];

        try {
            $stmt = $this->conn->prepare("SELECT name, phone_number, mail, description, image FROM affiliation WHERE id_affiliation = :id_affiliation");
            $stmt->bindParam(":id_affiliation", $id_affiliation);
            $stmt->execute();

            if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION["nameAffiliation"] = $result["name"];
                $_SESSION["phoneAffiliation"] = $result["phone_number"];
                $_SESSION["mailAffiliation"] = $result["mail"];
                $_SESSION["descriptionAffiliation"] = $result["description"];
                $_SESSION["imageAffiliation"] = $result["image"];
                $_SESSION['affiliation-popup'] = TRUE;
                header("Location: ../view/list-affiliations.php");
                exit();
            } else {
                $_SESSION["error"] = "Affiliation not found.";
                header("Location: ../view/list-affiliations.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION["error"] = "Error al actualizar la información de la afiliación: " . $e->getMessage();
            header("Location: ../view/list-affiliations.php");
            exit();
        }
    }
}
