<?php

    $codigo = $_POST['codigo'];
    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];
    $costo = $_POST['costo'];
    
    include("conexion.php");
    
    $sql = "INSERT INTO productos (codigo, producto, descripcion, precio, stock, costo) VALUES ('".$codigo."', '".$producto."', '".$descripcion."', '".$precio."', '".$stock."', '".$costo."')";
    if(mysqli_query($conexion, $sql)){
        echo "Datos guardados";
    }else{
        echo "Error al guardar: ".mysqli_error($conexion);
    }

    $conexion->close();
    
    header('location: ../dashboard.php?btn-opc=1');
?>