<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlashFood | Historial</title>
    <link rel="stylesheet" href="/src/assets/css/history.css" />
    <link rel="stylesheet" href="/src/assets/css/style.css" />
</head>

<body>
    <!-- Aside -->
    <?php require_once 'aside.php';?>

    <div class="center">
        <div class="info-form aligned">
            <h2>Historial y detalles</h2>
            <article>
                <div class="direccion-message">
                    <p>
                        <span class="bold">Hamburguesas Express | 13:30 hrs</span> <br>
                        Hoy decidimos visitar Hamburguesas Express al mediodía para probar su famosa hamburguesa con queso. El lugar estaba animado y el personal muy amable. Pedimos nuestras hamburguesas y en pocos minutos ya las teníamos en la mesa. La carne estaba jugosa, el pan fresco y las papas fritas crujientes. ¡Una deliciosa experiencia que sin duda repetiremos!
                    </p><br>
                    <p>
                        <span class="bold">Pizzería Veloz | 19:00 hrs</span> <br>
                        Anoche fuimos a la Pizzería Veloz para cenar con amigos. El ambiente era acogedor, con música de fondo y un olor tentador a pizza recién horneada. Probamos la pizza de pepperoni y la vegetariana, ambas estaban deliciosas. La masa era fina y crujiente, y los ingredientes frescos. Sin duda, un lugar perfecto para una cena informal y sabrosa.
                    </p><br>
                    <p><span class="bold">Tacos Picantes | 14:45 hrs</span> <br>
                        Esta tarde decidimos probar los tacos de Tacos Picantes para disfrutar de un almuerzo rápido y sabroso. El local estaba lleno de gente, lo cual siempre es una buena señal en un lugar de comida mexicana. Probamos los tacos al pastor y los de carnitas, ¡y estaban increíbles! La carne estaba bien sazonada y las salsas le dieron el toque perfecto. Definitivamente, un lugar al que volveremos pronto.
                    </p>
                    <p>
                        ...
                    </p>
                </div>
            </article>
        </div>
    </div>
</body>

</html>
