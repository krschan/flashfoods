<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con Imágenes y Botones</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th class="img-col">Imagen</th>
                <th class="text-col">Nombre</th>
                <th class="text-col">Teléfono</th>
                <th class="text-col">Correo</th>
                <th class="text-col">Descripción</th>
                <th class="button-col">Acciones</th>
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
                echo "<button type='submit' name='edit_affiliation' class='btn' onclick='openPopup(\"change-affiliation-popup.php\", \"" . $row["id_affiliation"] . "\")'>Actualizar</button>";

                echo "<button class='btn'>Eliminar</button>";
                echo "</td>";
                echo "</tr>";
            }                               
        } else {
            echo "<tr><td colspan='6'>No hay datos disponibles</td></tr>";
        }
        ?>

        </tbody>
    </table>

    <main class="content">
        <div id="popup" class="popup">
            <div class="popup-content"></div>
        </div>
    </main>

    <!-- js -->
    <script src="../js/popups.js"></script>
</body>
</html>
