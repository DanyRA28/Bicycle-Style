<?php
// incluir el archivo de conexión a la base de datos
include("conexion.php");

// verificar si se proporcionó el ID de venta
if(isset($_GET['id_venta'])) {
    // obtener el ID de venta desde la solicitud
    $id_venta = $_GET['id_venta'];
    
    // consulta SQL para obtener los productos vendidos correspondientes al ID de venta
    $consulta_productos = "SELECT codigo, producto, descripcion, cantidad, precio, costo
                           FROM productos_vendidos 
                           WHERE id_venta = $id_venta";
    
    // ejecutar la consulta
    $resultado_productos = $conexion->query($consulta_productos);
    
    // inicializar un array para almacenar los productos
    $productos = array();
    
    // recorrer los resultados y almacenarlos en el array
    while ($fila_producto = $resultado_productos->fetch_assoc()) {
        $productos[] = $fila_producto;
    }
    
    // devolver los detalles de los productos en formato JSON
    echo json_encode($productos);
} else {
    // si no se proporcionó el ID de venta, devolver un mensaje de error
    echo "ID de venta no proporcionado";
}

// cerrar la conexión a la base de datos
$conexion->close();
?>
