<?php
// Llamar a la conexión una vez
require_once 'connection.php';

$verificarNombre = isset($_POST['nombre']) && $_POST['nombre'];
$verificarPassword = isset($_POST['password']) && $_POST['password'];

if (!$verificarNombre || !$verificarPassword) {
    echo "Error en los valores";
    die();
}