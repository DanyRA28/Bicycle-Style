<?php

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    
    include("conexion.php");
    
    $sql = "INSERT INTO clientes (nombre, apellidos, direccion, telefono) VALUES ('".$nombre."', '".$apellidos."', '".$direccion."', '".$telefono."')";
    if(mysqli_query($conexion, $sql)){
        echo "Datos guardados";
    }else{+
        echo "Error al guardar: ".mysqli_error($conexion);
    }

    $conexion->close();
    
    header('location: ../dashboard.php?btn-opc=2');
?>