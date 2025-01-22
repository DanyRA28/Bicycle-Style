<?php
$codigo = $_GET['codigoEditar'];
$producto = $_GET['productoEditar'];
$descripcion = $_GET['descripcionEditar'];
$precio = $_GET['precioEditar'];
$stock = $_GET['stockEditar'];
$costo = $_GET['costoEditar'];

include("conexion.php");

$sql = "UPDATE productos set producto = '" . $producto . "', descripcion = '" . $descripcion . "', precio = '" . $precio . "', stock = '".$stock."', costo = '".$costo."' WHERE codigo = '" . $codigo . "'";
if (mysqli_query($conexion, $sql)) {
    echo "Actualizacion exitosa";
    header('location: ../dashboard.php?btn-opc=1');
} else {
    echo "Error al actualizar: " . mysqli_error($conexion);
}

$conexion->close();
?>