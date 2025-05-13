<?php

// Llama a la conexion una vez
require_once "connection.php";
require_once "traduccion_colores.php";

$usuario = $_POST['usuario'];
$color_es = strtolower($_POST['color']);
$color_en = $array_colores_es_en[$color_es] ?? $color_es;
$id_color = $_POST['id_color'];

// 1 - Definir la sentencia preparada
$update = "update colores SET usuario = ?, color_es = ?, color_en = ? WHERE id_color = ?;";
// 2 - Preparar la sentencia
$update_pre = $conn->prepare($update);
// 3 - Ejecutar la sentencia
$update_pre->execute([$usuario, $color_es, $color_en, $id_color]);
// 4 - Anular el $update_pre
$update_pre = null;
// 5 - Anular el $conn
$conn = null;

// para que vuelva a la pagina principal
header('location: index.php');