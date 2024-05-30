<?php
session_start();

class AjaxSlider
{
  private $conn;

  public function __construct()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flashfood";

    try {
      $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function showAffiliations($limit, $offset)
  {
    $stmt = $this->conn->prepare("SELECT name, phone_number, mail, description, image FROM affiliation LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $affiliations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($affiliations);
  }
}

if (isset($_POST['limit']) && isset($_POST['offset'])) {
  $ajaxSlider = new AjaxSlider();
  $ajaxSlider->showAffiliations($_POST['limit'], $_POST['offset']);
}
