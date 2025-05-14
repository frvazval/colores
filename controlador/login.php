<?php
// Llamar a la conexión una vez
require_once 'connection.php';

$verificarNombre = isset($_POST['nombre']) && $_POST['nombre'];
$verificarPassword = isset($_POST['password']) && $_POST['password'];

if (!$verificarNombre || !$verificarPassword) {
    echo "Error en los valores";
    die();
}

// Quitar los espacios

$nombre = trim($_POST['nombre']);
$password = trim($_POST['password']);

// Comprobar que no esten vacios
if (empty($nombre) || empty($password)) {
    echo "Error en los valores";
    die();
}


$nombre = htmlspecialchars($nombre, ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($password, ENT_QUOTES, "UTF-8");

// Comprobar si el usuario existe
$select = "SELECT * FROM usuarios WHERE nombre_usuario = :nombre";
$prep = $conn->prepare($select);
$prep->bindParam(":nombre", $nombre, PDO::PARAM_STR);
$prep->execute();

$usuarioExistente = $prep->fetch(PDO::FETCH_ASSOC);

if (!$usuarioExistente) {
    echo "UsuarioInexistente";
    die();
}


if (!password_verify($password, $usuarioExistente['password_usuario'])) {
    echo "passwordIncorrecto";
    die();
}

echo "Usuario identificado";