<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Información</title>
    <link rel="stylesheet" href="/src/assets/css/information.css" />
    <link rel="stylesheet" href="/src/assets/css/style.css" />
</head>

<body>
    <!-- Aside -->
    <?php require_once 'aside.php';?>

    <div class="info-box center">
        <div class="info-form aligned">
            <h2>Información de la cuenta</h2>
            <article>
                <img class="user-img" src="/src/assets/img/user.png" alt="imagen-perfil" />
                <h3 class="welcome">Bienvenido, @nombre</h3>
                <form>
                    <label for="usuario">Usuario</label><br />
                    <input type="text" id="user" name="usuario" placeholder="user" /><br />

                    <label for="nombre-y-apellido">Nombre y apellidos</label><br />
                    <input type="text" id="name-surname" name="nombre-y-apellido" placeholder="name surname1 surname2" /><br />

                    <label for="correo-electronico">Correo electrónico</label><br />
                    <input type="email" id="email" name="correo-electronico" placeholder="example@mail.com" /><br />

                    <label for="fecha-de-nacimiento">Fecha de nacimiento</label><br />
                    <input type="date" id="birth-date" name="fecha-de-nacimiento" /><br />

                    <label for="numero-de-telefono">Número de teléfono</label><br />
                    <input type="tel" id="phone-number" name="numero-de-telefono" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" /><br />

                    <input type="submit" value="Guardar cambios" />
                    <?php
                    if(isset($_SESSION['error'])) {
                        echo "<p style='color: red;'>".$_SESSION['error']."</p>";
                        unset($_SESSION['error']);
                    }
                    
                ?>
                
                </form>
            </article>
        </div>
    </div>
</body>

</html>
