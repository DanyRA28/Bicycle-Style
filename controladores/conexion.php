<?php
$nombre_servidor = "localhost";  
$nombre_usuario = "root";  
$contraseña = "";   
$nombre_db = "piloto"; 

// Crear una conexión
$conexion = new mysqli($nombre_servidor, $nombre_usuario, $contraseña, $nombre_db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}else{
    //echo "Conexión exitosa a la base de datos.";
}

?>

