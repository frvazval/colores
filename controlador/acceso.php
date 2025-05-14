<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

session_start();
// Llamar a la conexión una vez
require_once 'connection.php';
    

foreach ($_POST as $clave => $valor) {
    $_POST[$clave] = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
}

// Vigila si un bot intenta acceder
// if ( !empty($_POST['web'])  ) {
//     $_SESSION['error'] = true;
//     header('location: index.php');
//     exit();
// }

// Par impedir el acceso directo a isert.php
// if (!hash_equals($_SESSION['token'], $_POST['token'])) {
//     $_SESSION['error'] = true;
//     header('location: index.php');
//     exit();
// }

// if ( empty($usuario) || empty($color)) {
//     $_SESSION['error'] = true;
//     header('location: index.php');
//     exit();
// }

// Para convertir el color a minúsculas
// $color_es = strtolower($color);
// $color_en = $array_colores_es_en[$color_es] ?? $color_es;
// Traducir el color a inglés
// $encontrado = false;
// foreach ($array_colores_es_en as $clave => $valor) {
//     if ($clave == $color_es) {
//         $encontrado = true;
//         break;
//     }
// }
// if (!$encontrado) {
//     $color_es = "blanco";
// }


$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


// 1. Definir la sentencia preparada
$insert = "INSERT INTO usuarios(nombre_usuario, password_usuario, email, idioma) VALUES (:nombre, :pass, :email, :idioma);";
// 2. Preparación
$prep = $conn->prepare($insert);
// 3. Parametrizar los valores
$prep -> bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
$prep -> bindParam(':pass', $hash, PDO::PARAM_STR);
$prep -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$prep -> bindParam(':idioma', $_POST['idioma'], PDO::PARAM_STR);
// 4. Ejecución
$prep->execute();

$prep = null;
$conn = null;

echo "Usuario creado correctamente";

// Volver a casa -> index.php
// header('location: index.php');