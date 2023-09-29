<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_politica = $_POST["nombre_politica"];
    $descripcion = $_POST["descripcion"];
    $permisos_asociados = $_POST["permisos_asociados"];
    

    include('../Configuracion/conexion.php');
    // Aquí debes escribir la lógica para agregar la política de permisos a la base de datos

    // Preparar la consulta SQL para insertar el usuario
    $sql = "INSERT INTO politicaspermisos (nombre_politica, descripcion, permisos_asociados) 
            VALUES (?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("sss", $nombre_politica, $descripcion, $permisos_asociados);

    // Ejecutar la sentencia
    if ($stmt->execute()) {

    // Redirigir a una página de éxito o mostrar un mensaje
    header("Location: ../politica_permisos_exitosa.php");
    exit();
} else {
    // Hubo un error en la ejecución de la consulta
    echo "Error al registrar permiso: " . $stmt->error;
}

// Cerrar la sentencia y la conexión
$stmt->close();
$conexion->close();
}
?>
