<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST["placa"];
    $modelo = $_POST["modelo"];
    $ano = $_POST["ano"];
    $tipo_carga = $_POST["tipo_carga"];
    $capacidad_carga = $_POST["capacidad_carga"];

    include('../Configuracion/conexion.php');
    // Aquí debes escribir la lógica para agregar el vehículo a la base de datos
    // Preparar la consulta SQL para insertar el usuario
    $sql = "INSERT INTO vehiculos (placa, modelo, ano, tipo_carga, capacidad_carga) 
    VALUES (?, ?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("sssss", $placa, $modelo, $ano, $tipo_carga, $capacidad_carga);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
    


    // Redirigir a una página de éxito o mostrar un mensaje
    header("Location: ../ingreso_vehiculo_exitoso.php");
    exit();
    }else {
    // Hubo un error en la ejecución de la consulta
    echo "Error al registrar el vehículo: " . $stmt->error;
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
}
?>