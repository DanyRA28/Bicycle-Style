<?php
$id_cliente = $_GET['idEditar'];
$nombre = $_GET['nombreEditar'];
$apellidos = $_GET['apellidosEditar'];
$direccion = $_GET['direccionEditar'];
$telefono = $_GET['telefonoEditar'];

include("conexion.php");

$sql = "UPDATE clientes set nombre = '" . $nombre . "', apellidos = '" . $apellidos . "', direccion = '" . $direccion . "', telefono = '".$telefono."' WHERE id_cliente = '" . $id_cliente . "'";
if (mysqli_query($conexion, $sql)) {
    echo "Actualizacion exitosa";
    header('location: ../dashboard.php?btn-opc=2');
} else {
    echo "Error al actualizar: " . mysqli_error($conexion);
}

$conexion->close();
?>