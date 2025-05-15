<?php
session_start(); // -> $_SESSION
$_SESSION['token'] = bin2hex(random_bytes(64));


// include 'connection.php';
// require 'connection.php';
// include_once 'connection.php';

// Llamar a la conexión una vez
require_once 'controlador/connection.php';


?>

<!DOCTYPE html>
<html lang="es">

<head>
<?php include_once 'modulos/meta.php';?>
    <title>Colores</title>
      
</head>

<body>
<?php include_once 'modulos/header.php';?>
    <main class="main-index">
        <section>
            <img src="img/colores.webp" alt="Manos pintadas con colores vivos">
        </section>
        <section >
<?php
$formulario = $_GET['formulario'] ?? 'login';

switch ($formulario) {
    case "login":
        include_once 'formularios/form_login.php';
        break;
            case "crear_cuenta":
        include_once 'formularios/form_crear_usuario.php';
        break;
                    case "reset":
        include_once 'formularios/form_reset_password.php';
        break;
}

?>
           
        </section>
    </main>

    <script src="js/index.js"></script>
</body>

</html>
<?php
