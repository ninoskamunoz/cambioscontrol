<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_peaje = $_POST["nombre_peaje"];
    $costo = $_POST["costo"];
    $region = $_POST["region"];

    include('../Configuracion/conexion.php');
    // Aquí debes escribir la lógica para agregar la tarifa de peaje a la base de datos
    $sql = "INSERT INTO tarifaspeajes (nombre_peaje, costo, region) 
    VALUES (?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("sss", $nombre_peaje, $costo, $region);

    // Ejecutar la sentencia
    if ($stmt->execute()) {

    // Redirigir a una página de éxito o mostrar un mensaje
    header("Location: ../ingreso_tarifa_exitoso.php");
    exit();
    }else {
    // Hubo un error en la ejecución de la consulta
    echo "Error al registrar la tarifa: " . $stmt->error;
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
}
?>
