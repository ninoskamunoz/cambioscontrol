<?php
// Realiza la conexión a la base de datos (incluye tu archivo de conexión)
include('Configuracion/conexion.php');

// Consulta SQL para seleccionar todos los usuarios
$sql = "SELECT user_id, username, nombre, correo_electronico, rol FROM usuarios";

// Ejecuta la consulta
$resultado = $conexion->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios Registrados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
<body>
    <div class="container mt-5">
        <h2 class="text-center">Usuarios Registrados</h2><br>

        <table class="table table-striped">
            <thead>
                <tr >
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $fila['user_id']; ?></td>
                        <td><?php echo $fila['username']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['correo_electronico']; ?></td>
                        <td><?php echo $fila['rol']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            <p><a href="index.php">Volver a la página principal</a></p>
            <p><a href="usuarios.php">Listado Registro Usuarios</a></p>
        </table>
    </div>
</body>
</html>

<?php
// Cierra la conexión a la base de datos
$conexion->close();
?>
