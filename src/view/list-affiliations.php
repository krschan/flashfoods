<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Flash Food gives you the best offers and discounts near you." />
    <meta name="generator" content="FlashFood">
    <title>FlashFood | Affiliations list</title>
    <link rel="icon" type="image/png" href="../images/flashfoods-logo-f.png">
    <link rel="stylesheet" href="../css/normal-page.css">
    <script src="/src/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/src/assets/js/slick-1.8.1/slick/slick.js"></script>
    <script src="/src/assets/js/dist/jquery.validate.js"></script>
    <script src="/src/assets/js/dist/additional-methods.js"></script>
</head>
<body id="grey-background" class="center">
    <div id="white-background">
        <div class="div-logo">
            <a href="../index.php"><img class="logo center" src="../images/flashfoods-logo.png" alt="logo-flashfood"></a>
        </div>
        <div id="div-title">
            <a href="#">
                <button id="technical-title">Affiliation list</button>
            </a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th class="img-col">Image</th>
                <th class="text-col">Name</th>
                <th class="text-col">Phone</th>
                <th class="text-col">Email</th>
                <th class="text-col">Description</th>
                <th class="button-col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once '../controller/AdminController.php';

            $admin = new AdminController();
            $result = $admin->getAffiliations();

            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td class='img-col'><img src='../model/" . $row["image"] . "' alt='" . $row["name"] . "'></td>";
                    echo "<td class='text-col'>" . $row["name"] . "</td>";
                    echo "<td class='text-col'>" . $row["phone_number"] . "</td>";
                    echo "<td class='text-col'>" . $row["mail"] . "</td>";
                    echo "<td class='text-col'>" . $row["description"] . "</td>";
                    echo "<td class='button-col'>";
                    echo "<form method='POST' action='../controller/AdminController.php'>";
                    echo "<input type='hidden' name='id_affiliation' value='" . $row["id_affiliation"] . "'>";
                    echo "<button type='submit' name='edit_affiliation' class='btn'>Update</button>";
                    echo "<button type='submit' name='delete_affiliation' class='btn'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    if (isset($_SESSION['affiliation-popup']) && $_SESSION['affiliation-popup'] == TRUE) {
        include 'change-affiliation-popup.php';
    }
    ?>

</body>
</html>
