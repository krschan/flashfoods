<?php
session_start();

class AjaxUpdateUser
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
    $successMessage = "Profile successfully updated";
    $failMessage = "Unable to update profile";
    $successId = "updateSuccess";
    $failId = "updateFailed";
    $nameSurname = isset($_POST['nameSurname']) ? ($_POST['nameSurname']) : '';
    $birthDate = isset($_POST['birthDate']) ? ($_POST['birthDate']) : '';
    $phoneNumber = isset($_POST['phoneNumber']) ? ($_POST['phoneNumber']) : '';

    if (empty($mail)) {
      echo json_encode(array("message" => "Insert a valid email address"));
      return;
    }
    try {
      $stmt = $this->conn->prepare("UPDATE user SET username = :username, mail = :email, name = :nameSurname, birth_date = :birthDate, phone_number = :phoneNumber WHERE username = :currentUsername");
      $stmt->bindParam(":username", $username);
      $stmt->bindParam(":email", $currentEmail);
      $stmt->bindParam(":nameSurname", $nameSurname);
      $stmt->bindParam(":birthDate", $birthDate);
      $stmt->bindParam(":phoneNumber", $phoneNumber);
      $stmt->bindParam(":currentUsername", $currentUsername);
      $success = true;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      $success = false;
    }

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
    ;
  }
}
// invoke the method inside the class
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $validator = new AjaxUpdateUser();
  $validator->updateAccount();
}