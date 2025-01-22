<?php
session_start();

if(isset($_GET['btn-agregar'])){


    $cod = $_GET['btn-agregar'];
    //$id_cliente = $_GET['id_cliente'];

    include("conexion.php");
    $sql = "SELECT * FROM productos WHERE codigo = '".$cod."'";
    $res = $conexion->query($sql);

    while($fila = $res->fetch_assoc()){
        $producto = array(
            'codigo' => $fila['codigo'],
            'producto' => $fila['producto'],
            'descripcion' => $fila['descripcion'],
            'precio' => $fila['precio'],
            'costo' => $fila['costo']
        );

        //$producto['id_cliente'] = $id_cliente;
        $_SESSION['carrito'][] = $producto;
    }

    $conexion->close();
                    
}

?>