<?php
// echo "soy index.php";
// Con el include no se generaria un error critico si no se conecta, solo un warning
// include "connection.php";
// Hace el include solo una vez
// include_once "connection.php";
// Con el require se generaria un error critico si no se conecta, y no se ejecutaria el resto del codigo
// require "connection.php";
// Hace el require solo una vez
require_once "connection.php";

// 1 - Definir la sentencia (query)
$select = "SELECT * FROM colores;";
// 2 - Preparar la sentencia
$select_pre = $conn->prepare($select);
// 3 - Ejecutar la sentencia
$select_pre->execute();
// 4 - Obtener los resultados
$array_filas = $select_pre->fetchAll();
// 5 - Mostrar los resultados
// foreach ($array_filas as $fila) {
//     echo "<pre>";
//     print_r($fila);
//     echo "</pre>";
// }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header><h1>Nuestros colores preferidos</h1></header>
    <main>
        <section>
            <h2>Nuestros usuarios</h2>
            <?php foreach($array_filas as $fila) : ?>
                <div style="background-color: <?=$fila['color_en'] ?>;">
                    <p> <?php echo $fila["usuario"] ?></p>
                </div>

            <?php endforeach ?>
        </section>
        <section>
            <h2>Indica tus datos</h2>
            <form action="insert.php" method="post">
                <fieldset>
                    <div>
                        <label for="usuario">Nombre del usuario</label>
                        <input type="text" name="usuario">
                    </div>
                    <div>
                        <label for="color">Nombre del color</label>
                        <input type="text" name="color">
                    </div>
                    <div>
                        <button type="submit">Enviar</button>
                        <button type="reset">Limpiar formulario</button>
                    </div>
                </fieldset>
            </form>    
        </section>    

    </main>
</body>
</html>