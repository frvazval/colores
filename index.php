<?php
error_reporting(0); // -> para que no muestre errores
session_start(); // -> crea $_SESSION , que es un array asociativo
$_SESSION['token'] = bin2hex(random_bytes(64)); // -> crea un token aleatorio de 64 bytes

// echo "soy index.php";
// Con el include no se generaria un error critico si no se conecta, solo un warning
// include "connection.php";
// Hace el include solo una vez
// include_once "connection.php";
// Con el require se generaria un error critico si no se conecta, y no se ejecutaria el resto del codigo
// require "connection.php";
// Hace el require solo una vez
require_once "connection.php";

$array_fondo_claro = ["white", "yellow", "pink", "darksalmon", "orange"];

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header><h1>Nuestros colores preferidos</h1></header>
    <main>
        <section>
            <h2>Nuestros usuarios</h2>
            <?php foreach($array_filas as $fila) : ?>
                <?php $color = "white";
                    if (in_array($fila['color_en'],$array_fondo_claro)) {
                        $color = "black";
                    }   
                    
                ?>
                <div style="background-color: <?=$fila['color_en'] ?>;color:<?=$color?>;">
                    <p> <?php echo $fila["usuario"] ?></p>
                    <span class="icons">
                        <a href="index.php?id=<?=$fila['id_color']?>&usuario=<?=$fila['usuario']?>&color=<?=$fila['color_es']?>" title="Modificar valores">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="delete.php?id=<?=$fila['id_color']?>" title="Eliminar elementos">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                </span>
                </div>

            <?php endforeach ?>
        </section>
        <section>
            <?php if($_GET): ?>
            <h2>Modifica tus datos</h2>
            <!-- Formulario para modificar los datos -->
            <form action="update.php" method="post">
                <input type="hidden" name="id_color" value="<?=$_GET['id']?>">
                <fieldset>
                    <div>
                        <label for="usuario">Nombre del usuario</label>
                        <input type="text" name="usuario" value="<?=$_GET['usuario']?>" maxlength="20">
                    </div>
                    <div>
                        <label for="color">Nombre del color</label>
                        <input type="text" name="color" value="<?=$_GET['color']?>" maxlength="20">
                    </div>
                    <div>
                        <button type="submit">Enviar</button>
                        <a href="index.php">Cancelar</a>
                    </div>
                </fieldset>
            </form>
                <?php else: ?>

            <h2>Indica tus datos</h2>
            <!-- Formulario para insertar un nuevo usuario y su color preferido -->
            <form action="insert.php" method="post">
                <input type="hidden" name="token" value ="<?= $_SESSION['token'] ?>">
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
           <?php endif ?> 
            
            
        </section>    

        <?php if ($_SESSION['error']): ?>
            <p>El token no coincide. Por favor, vuelve a intentarlo.</p>
        <?php endif; ?>
              
    </main>
</body>
</html>

<?php
$_SESSION['error'] = false; // -> para que no vuelva a mostrar el error
?>