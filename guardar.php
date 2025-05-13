<?php
$conexion = new mysqli("localhost", "root", "", "AJAXDBII");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$id = $_POST['id'];
$nombre = $conexion->real_escape_string($_POST['nombre']);
$email = $conexion->real_escape_string($_POST['email']);

if ($id) {
    // Editar
    $sql = "UPDATE registros SET nombre='$nombre', email='$email' WHERE id=$id";
    if ($conexion->query($sql)) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
} else {
    // Insertar nuevo
    $sql = "INSERT INTO registros (nombre, email) VALUES ('$nombre', '$email')";
    if ($conexion->query($sql)) {
        echo "Registro añadido correctamente.";
    } else {
        echo "Error al insertar: " . $conexion->error;
    }
}

$conexion->close();
?>