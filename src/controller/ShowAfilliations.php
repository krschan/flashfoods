<?php
session_start();
class ShowAfilliations
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

    function showAffiliationsLogo()
    {
        $stmt = $this->conn->query("SELECT name, image FROM affiliation");
        if ($stmt->rowCount() > 0) {
            echo '<div class="affiliations-slider">';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $imagePath = '../model/' . $row["image"];
                echo '<div class="slick-carousel">';
                echo '<img src="' . htmlspecialchars($imagePath) . '" alt="' . htmlspecialchars($row["name"]) . '" >';
                echo '<p>' . htmlspecialchars($row["name"]) . '</p>';
                echo '</div>';
            }
            echo '</div>';
        } else {
          echo '<p style="text-align: center; padding: 4rem 0">No affiliations created</p>';
        }
    }
}

// Ejemplo de uso
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $showAffiliations = new ShowAfilliations();
    $showAffiliations->showAffiliationsLogo();
}
