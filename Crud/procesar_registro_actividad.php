<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $accion_realizada = $_POST["accion_realizada"];
    $fecha_hora = $_POST["fecha_hora"];
    $descripcion_detallada = $_POST["descripcion_detallada"];

    include('../Configuracion/conexion.php');
    // Aquí debes escribir la lógica para registrar la actividad en la base de datos
    $sql = "INSERT INTO registrosactividades (usuario, accion_ralizada, fecha_hora, descripcion_detallada) 
    VALUES (?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("ssss", $usuario, $accion_realizada, $fecha_hora, $descripcion_detallada);

    // Ejecutar la sentencia
    if ($stmt->execute()) {

    // Redirigir a una página de éxito o mostrar un mensaje
    header("Location: ../registro_actividad_exitoso.php");
    exit();
    }else {
    // Hubo un error en la ejecución de la consulta
    echo "Error al registrar la actividad: " . $stmt->error;
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
}
?>
