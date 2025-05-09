<?php

// Llama a la conexion una vez
require_once "connection.php";
require_once "traduccion_colores.php";

// $_POST
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$usuario = $_POST["usuario"];
$color_es = strtolower($_POST["color"]);

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
$insert_pre->execute([$usuario, $color_es, $array_colores_es_en[$color_es]]);
// 4 - Anular el $insert_pre
$insert_pre = null;
// 5 - Anular el $conn
$conn = null;

// para que vuelva a la pagina principal
header('location: index.php');