<?php
if(isset($_POST['btnIniciar'])){
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    $cifrada = sha1($contra);
    
    include("conexion.php");
    $sql = $conexion -> query("SELECT * FROM usuarios WHERE usuario = '".$usuario."' and password = '".$contra."'");
    
    if ($datos=$sql->fetch_object()) {
        //echo "<div id='div-bienvenido'>Bienvenido</div>";
        //echo "<div style='background-color: green; text-align: center;'>Bienvenido</div>";
        header("location:home.php");
    } else {
        echo "<div style='
        background-color: red; 
        text-align: center; 
        border-radius: 10px;
        padding: 20px;
        color: white;
        font-family: Arial, sans-serif;
        font-size: 18px;
        font-weight: bold;
        margin: 20px auto;
        max-width: 300px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        '>ACCESO DENEGADO</div>";
    }
}

?>

