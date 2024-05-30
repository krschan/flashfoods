<?php
session_start();

class AjaxUpdateAffiliation
{
  private $conn;

  // database connection
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

  public function updateAccount()
  {
    $success = null;
    $successMessage = "Affiliation successfully updated";
    $failMessage = "Unable to update affiliation information";
    $successId = "updateSuccess";
    $failId = "updateFailed";
    $name = isset($_POST['name']) ?
      ($_POST['name']) : '';
    $phoneNumber = isset($_POST['phoneNumber']) ? ($_POST['phoneNumber']) : '';
    $email = isset($_POST['email']) ? ($_POST['email']) : '';
    $description = isset($_POST['description']) ? ($_POST['description']) : '';
    $idAffiliation = isset($_POST['id_affiliation']) ? ($_POST['id_affiliation']) : '';


    try {
      $stmt = $this->conn->prepare("UPDATE affiliation SET name = :name, phone_number = :phoneNumber, mail = :email, description = :description WHERE id_affiliation = :id_affiliation");
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":phoneNumber", $phoneNumber);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":description", $description);
      $stmt->bindParam(":id_affiliation", $idAffiliation);
      $stmt->execute();
      $success = true;
    } catch (PDOException $e) {
      echo "Error executing query: " . $e->getMessage();
      $success = false;
    }

    header('Content-Type: application/json');
    if ($success) {
      $response = array(
        "message" => $successMessage,
        "identifier" => $successId
      );
    } else {
      $response = array(
        "message" => $failMessage,
        "identifier" => $failId
      );
    }
    echo json_encode($response);
  }
}

// invoke the method inside the class
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $validator = new AjaxUpdateAffiliation();
  $validator->updateAccount();
}