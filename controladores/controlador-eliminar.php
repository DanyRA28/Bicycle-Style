<?php

    $id = $_GET['id'];
    $tabla = $_GET['tabla'];
    $pkey = $_GET['pkey'];
    $opc = $_GET['opc'];

    include('conexion.php');
    $sql = "DELETE FROM ".$tabla." WHERE ".$pkey." = '".$id."'";
    $res = $conexion->query($sql);

    $conexion->close();
    header('location: ../dashboard.php?btn-opc='.$opc.'');


?>