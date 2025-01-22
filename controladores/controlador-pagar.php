<?php 
session_start();

if(isset($_POST['btn-pagar'])){
    include("conexion.php");
    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        // Resto del código para insertar en la base de datos
        // ...
        // Establecer una variable de sesión para indicar que se necesita confirmación
        $_SESSION['confirmar_pago'] = true;
    }
}

header('location: ../vistas/punto-venta.php');
exit();

?>