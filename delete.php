<?php

// Llama a la conexion una vez
require_once "connection.php";

// 1 - Definir la sentencia preparada
$delete = "DELETE FROM colores WHERE id_color = ?;";

// 2 - Preparar la sentencia
$delete_pre = $conn->prepare($delete);
// 3 - Ejecutar la sentencia
$delete_pre->execute($_GET['id']);
// 4 - Anular el $delete_pre
$delete_pre = null;
// 5 - Anular el $conn
$conn = null;

// para que vuelva a la pagina principal
header('location: index.php');