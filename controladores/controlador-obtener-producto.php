<?php
if (isset($_GET['id'])) {
    include("conexion.php");

    $idProducto = $_GET['id'];

    $consulta = "SELECT * FROM productos WHERE codigo = $idProducto";

    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        $datosUsuario = $resultado->fetch_assoc();

        $arrayResponse = array_values($datosUsuario);

        echo json_encode($arrayResponse);
    } else {
        echo json_encode(array("error" => "No existe en BD"));
    }

    $conexion->close();
} else {
    echo json_encode(array("error" => "falta id"));
}
?>