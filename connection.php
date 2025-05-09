<?php
// Datos de acceso a la BD
// tambien se puede poner $server = "127.0.0.1";
$host = "localhost";
$database = "colores";
// $database = "biblioteca";
$port = 3307;
$user = "root";
$password = "root";

// Conexión a la base de datos
try {
    $conn = new PDO ("mysql:host=$host;port=$port;dbname=$database", $user, $password);
    // echo "Conectado !!";

    // Demo conexion
    // foreach ($conn -> query("SELECT * FROM usuarios") as $fila) {
    //     echo "<pre>";
    //     print_r ($fila);
    //     echo "</pre>";
    //}
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>