<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo_electronico"];
    $rol = $_POST["rol"];
  



    // Validar y procesar los datos antes de insertar en la base de datos
    // Por ejemplo, puedes validar que el nombre de usuario no esté duplicado
    // y aplicar hash a la contraseña antes de almacenarla en la base de datos.

    // Ejemplo de hash de contraseña usando contraseña segura (recomendado):
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Realizar la conexión a la base de datos (incluye tu archivo de conexión)
    include('../Configuracion/conexion.php');

    // Preparar la consulta SQL para insertar el usuario
    $sql = "INSERT INTO usuarios (username, password, nombre, correo_electronico, rol) 
            VALUES (?, ?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("sssss", $username, $hashed_password, $nombre, $correo, $rol);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        // El usuario se ha registrado con éxito
        header("Location: ../registro_usuario_exitoso.php");
        exit();
    } else {
        // Hubo un error en la ejecución de la consulta
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
}
?>
