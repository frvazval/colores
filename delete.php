<?php

// Llama a la conexion una vez
require_once "connection.php";

// 1 - Definir la sentencia preparada
$insert = "DELETE FROM colores WHERE id_color = $_POST[id_color];";
// 2 - Preparar la sentencia
$insert_pre = $conn->prepare($insert);
// 3 - Ejecutar la sentencia
$insert_pre->execute();
// 4 - Anular el $insert_pre
$insert_pre = null;
// 5 - Anular el $conn
$conn = null;

// para que vuelva a la pagina principal
header('location: index.php');