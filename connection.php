<?php
// Datos de acceso a la BD
// tambien se puede poner $server = "127.0.0.1";
$host = "localhost";
$database = "colores";
$port = 3307;
$user = "root";
$password = "root";

// Conexión a la base de datos
try {
    $conn = new PDO ("mysql:host=$host;port=$port;dbname=$database;charset='UTF-8'", $user, $password);
    echo "Conectado !!";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>