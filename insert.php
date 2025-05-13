<?php
session_start();
// Llama a la conexion una vez
require_once "connection.php";
require_once "traduccion_colores.php";

// $_POST
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$usuario = $_POST["usuario"];
// para que no permita ejecutar codigo html y las comillas
$usuario = htmlentities($usuario, ENT_QUOTES, "UTF-8");


if (!empty ($_POST['web'])) {
    // Si el campo web no está vacío, redirigir a la página de inicio
    // Porque significa que alguien ha intentado hacer un ataque
    $_SESSION['error'] = true;
    header('location:index.php');
    exit();
}

if (!hash_equals($_SESSION['token'], $_POST['token'])) {
    // Si el token no coincide, redirigir a la página de inicio
    $_SESSION['error'] = true;
    header('location:index.php');
    exit();
}

$color_es = strtolower($_POST["color"]);
$color_en = $array_colores_es_en[$color_es] ?? $color_es;

$encontrado = false;
foreach ($array_colores_es_en as $clave => $valor) {
    if ($clave == $color_es) {
        $encontrado = true;
        break;
    }
}

if (!$encontrado) {
    $color_es = "blanco";
}

// 1 - Definir la sentencia preparada
$insert = "INSERT INTO colores(usuario, color_es, color_en) VALUES (?, ?, ?);";
// 2 - Preparar la sentencia
$insert_pre = $conn->prepare($insert);
// 3 - Ejecutar la sentencia
$insert_pre->execute([$usuario, $color_es, $color_en]);
// 4 - Anular el $insert_pre
$insert_pre = null;
// 5 - Anular el $conn
$conn = null;

// para que vuelva a la pagina principal
header('location: index.php');