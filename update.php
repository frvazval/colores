<?php

// Llama a la conexion una vez
require_once "connection.php";

// 1 - Definir la sentencia preparada
$update = "update FROM colores WHERE id_color = ?;";
// 2 - Preparar la sentencia
$update_pre = $conn->prepare($update);
// 3 - Ejecutar la sentencia
$update_pre->execute([$_GET['id']]);
// 4 - Anular el $update_pre
$update_pre = null;
// 5 - Anular el $conn
$conn = null;

// para que vuelva a la pagina principal
header('location: index.php');