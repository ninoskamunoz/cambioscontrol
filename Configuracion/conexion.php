<?php

$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "controlcambios";
// Intentar establecer la conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar si la conexión tuvo éxito
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Establecer el conjunto de caracteres de la conexión
$conexion->set_charset("utf8");


?>
