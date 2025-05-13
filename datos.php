<?php
$conexion = new mysqli("localhost", "root", "", "AJAXDBII");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$sql = "SELECT * FROM registros";
$resultado = $conexion->query($sql);

$registros = array();
while ($fila = $resultado->fetch_assoc()) {
    $registros[] = $fila;
}
header('Content-Type: application/json');
echo json_encode($registros);
$conexion->close();
?>