<?php
if (isset($_GET['btn-opc'])) {
    $opc = $_GET['btn-opc'];
} else {
    $opc = 0;
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicycle Style</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">

    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="1libs/mycss/style.css">
    <link rel="stylesheet" href="1libs/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <!--Menu Principal-->
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <img src="img/logo.png" width="16%" class="img-fluid" /><a href="#"> &nbsp;BICYCLE STYLE</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Elemenos de Administrador
                    </li>
                    <li class="sidebar-item">
                        <a href="/../TITULACION/web/home.php" class="sidebar-link">
                            <i class="fa-solid fa-home pe-2"></i>
                            Home
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="?btn-opc=0" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Listas
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="?btn-opc=4" class="sidebar-link">Usuarios</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="?btn-opc=1" class="sidebar-link">Productos</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="?btn-opc=2" class="sidebar-link">Clientes</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages2" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-table pe-2"></i>
                            Reportes
                        </a>
                        <ul id="pages2" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="?btn-opc=5" class="sidebar-link">Ventas</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="?btn-opc=6" class="sidebar-link">Productos</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="?btn-opc=7" class="sidebar-link">Clientes</a>
                            </li>
                        </ul>
                    </li>


                    <li class="sidebar-item">
                        <a onclick="Puntoventa()" class="sidebar-link" data-bs-target="#posts" data-bs-toggle="" aria-expanded="false"><i class="fa-solid fa-shopping-cart pe-2"></i>
                            Punto de Venta
                        </a>

                    </li>
             <!--       <li class="sidebar-item">
                        <a href="?btn-opc=3" class="sidebar-link" data-bs-target="#auth" data-bs-toggle="" aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                            Desarrollador
                        </a>

                    </li>-->
                   

                </ul>
            </div>
        </aside>
        <div class="main" style="background-color:#45B39D;">
            <nav class="navbar navbar-expand px-3 border-botton" style="background-color:#0E6655;">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="img/userrr.png" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Perfil</a>
                                <a href="#" class="dropdown-item">Configuración</a>
                                <a href="index.php" class="dropdown-item">Salir</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            
    <br>
            <!--Aqui Se termina el Menu Principal -->

            <main class="content px-3 py-2">
                <div class="container-fluid" style="background-color:#45B39D;">
                    <div class="mb-3">
                        <center>
                            <h3><b>
                                    <?php
                                    switch ($opc) {
                                        case 0:
                                            echo "DASHBOARD";
                                            break;
                                        case 1:
                                            echo "INVENTARIO";
                                            break;
                                        case 2:
                                            echo "CLIENTES";
                                            break;
                                        case 3:
                                            echo "DESARROLLADORES";
                                            break;
                                        case 4:
                                            echo "USUARIOS";
                                            break;
                                        case 5:
                                            echo "REPORTE DE VENTAS";
                                            break;
                                        case 6:
                                            echo "REPORTE DE PRODUCTOS";
                                            break;
                                        case 7:
                                            echo "REPORTE DE CLIENTES";
                                            break;
                                    }
                                    ?>
                                </b></h3>
                        </center>
                    </div>
                    <?php
                    switch ($opc) {
                        case 0:
                            //include("vistas/prueba.php");
                            include("vistas/principal.php");
                            break;
                        case 1:
                            include("vistas/inventario.php");
                            break;
                        case 2:
                            include("vistas/clientes.php");
                            break;
                        case 3:
                            include("vistas/desarrolladores.php");
                            break;
                        case 4:
                            include("vistas/usuarios.php");
                            break;
                        case 5:
                            include("vistas/reporte-ventas.php");
                            break;
                        case 6:
                            include("vistas/reporte-productos.php");
                            break;
                        case 7:
                            include("vistas/reporte-clientes.php");
                            break;
                    }
                    ?>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>

            <footer class="footer">
                <center>
                    <p class="mb-0">&copy Daniel Rosales</p>
                </center>
                <br><br>
            </footer>


            <div class="modal fade" id="ModalAbrirPuntoVenta" tabindex="-1" aria-labelledby="ModalAbrirPuntoVenta" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalAbrirPuntoVenta">Punto de Venta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Aquí puedes agregar los campos del formulario para agregar un nuevo usuario -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <center><button type="button" class="btn btn-primary" id="btnAcceder">Acceder</button></center>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="1libs/myjs/script.js"></script>
            <script src="libs/script.js"></script>

            <script>
                function Puntoventa() {
                    var modal = new bootstrap.Modal(document.getElementById('ModalAbrirPuntoVenta'));
                    modal.show();

                    document.getElementById('btnAcceder').addEventListener('click', function() {
                        var password = document.querySelector("#ModalAbrirPuntoVenta input[type='password']").value;
                        if (password === "1234") {
                            window.location.href = "vistas/punto-venta.php";
                        } else {
                            alert("Contraseña incorrecta. Inténtelo de nuevo.");
                        }
                    });
                }
            </script>

</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');

    * {
        font-family: 'Century Gothic', sans-serif;
    }
</style>