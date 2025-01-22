<?php

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $cifrada = sha1($password);
 
    include("conexion.php");
    
    $sql = "INSERT INTO usuarios (usuario, password) VALUES ('".$usuario."', '".$cifrada."')";
    if(mysqli_query($conexion, $sql)){
        echo "Datos guardados";
    }else{
        echo "Error al guardar: ".mysqli_error($conexion);
    }

    $conexion->close();
    
    header('location: ../dashboard.php?btn-opc=4');
?>