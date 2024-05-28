<?php
session_start();
class EmailValidator
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

  public function validateEmail()
  {
    // error message in case the mail is empty or does not have a valid mail format
    $mail = isset($_POST['mail']) ? filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL) : '';

    if (empty($mail)) {
      echo json_encode(array("message" => "Insert a valid email address"));
      return;
    }

    // if the mail is the same, it gives a "count". If there is no mail equal to the mail set, it gives a "count" = 0. If there is, it is already 1.
    $stmt = $this->conn->prepare("SELECT COUNT(*) FROM user WHERE mail = :mail");
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
      $response = array("message" => "The email is taken, try again");
    } else {
      $response = array("message" => "Valid Email");
    }

    echo json_encode($response);
    ;
  }
}

// invoke the method inside the class
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $validator = new EmailValidator();
  $validator->validateEmail();
}