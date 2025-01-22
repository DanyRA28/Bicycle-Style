<?php
$id_usuario = $_GET['idEditar'];
$usuario = $_GET['usuarioEditar'];
$password = $_GET['passwordEditar'];

$cifrada = sha1($password);

include("conexion.php");

$sql = "UPDATE usuarios set usuario = '" . $usuario . "', password = '" . $cifrada . "' WHERE id_usuario = '" . $id_usuario . "'";
if (mysqli_query($conexion, $sql)) {
    echo "Actualizacion exitosa";
    header('location: ../dashboard.php?btn-opc=4');
} else {
    echo "Error al actualizar: " . mysqli_error($conexion);
}

$conexion->close();
?>