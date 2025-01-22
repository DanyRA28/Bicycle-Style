<?php

$total = $_POST['total'];
$costo = $_POST['costo'];

$id_cliente = $_POST['cliente_seleccionado'];

date_default_timezone_set('America/Mexico_City');
$fecha_actual = date("Y-m-d");


session_start();
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    include("conexion.php");

   // echo "total: " . $total . " costo: " . $costo . " fecha: " . $fecha_actual;

    $sql = "INSERT INTO ventas (fecha, id_cliente, total, costo) VALUES ('" . $fecha_actual . "', '".$id_cliente."' , '" . $total . "', '" . $costo . "')";
    if (mysqli_query($conexion, $sql)) {
        echo "guardados";
    }

    $idVenta = $conexion->insert_id;

    foreach ($_SESSION['carrito'] as $producto) {

        $sql = "INSERT INTO productos_vendidos (codigo, producto, descripcion, cantidad, precio, id_venta, costo) VALUES ('" . $producto['codigo'] . "', '" . $producto['producto'] . "', '" . $producto['descripcion'] . "', 1, '" . $producto['precio'] . "', '" . $idVenta . "', '" . $producto['costo'] . "')";
        if (mysqli_query($conexion, $sql)) {
            echo "guardados";

            $sql = "UPDATE productos set stock = stock - 1 WHERE codigo = '" . $producto['codigo'] . "'";
            if (mysqli_query($conexion, $sql)) {
                echo "stock actualizado";
            }
        }
    }
    unset($_SESSION['carrito']);
}

header('location: ../vistas/punto-venta.php');
exit();

/*
if(isset($_POST['btnConfirmarVenta'])){

    include("conexion.php");

    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {

        $total = $_POST['total'];
        $costo = $_POST['costo'];

        date_default_timezone_set('America/Mexico_City');
        $fecha_actual = date("Y-m-d");
            
        $sql = "INSERT INTO ventas (fecha, id_cliente, total, costo) VALUES ('".$fecha_actual."', '1', '".$total."', '".$costo."')";
        if(mysqli_query($conexion, $sql)){
            echo "guardados";
        }

        $idVenta = $conexion->insert_id;

        foreach ($_SESSION['carrito'] as $producto) {
            
            $sql = "INSERT INTO productos_vendidos (codigo, producto, descripcion, cantidad, precio, id_venta, costo) VALUES ('".$producto['codigo']."', '".$producto['producto']."', '".$producto['descripcion']."', 1, '".$producto['precio']."', '".$idVenta."', '".$producto['costo']."')";
            if(mysqli_query($conexion, $sql)){
                echo "guardados";

                $sql = "UPDATE productos set stock = stock - 1 WHERE codigo = '".$producto['codigo']."'";
                if(mysqli_query($conexion, $sql)){
                    echo "stock actualizado";
                }

            }



        }
    }
    unset($_SESSION['carrito']);
}


header('location: ../vistas/punto-venta.php');
exit();
*/
