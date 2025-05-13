<?php
$conexion = new mysqli("localhost", "root", "", "AJAXDBII");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$id = intval($_POST['id']);

$sql = "DELETE FROM registros WHERE id = $id";
if ($conexion->query($sql)) {
    echo "Registro eliminado correctamente.";
} else {
    echo "Error al eliminar: " . $conexion->error;
}

$conexion->close();
?>