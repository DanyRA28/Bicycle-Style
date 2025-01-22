<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUNTO DE VENTA</title>

    <link href="../estilos/style.css" rel="stylesheet">
    <link href="../libs/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="icon" href="../img/logo.png" type="image/x-icon">
</head>

<body class="body-pnt">

    <nav class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">
        <div class="container">
            <a class="navbar-brand">
                <img src="../img/logo.png" alt="logo" width="57">
                <span class="text-black">Bicycle Style</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarhome">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                </ul>
            </div>
        </div>
    </nav>

    <div class></div>

    <section id="punto-venta">
        <div class="container-punto">
            <div class="izquierda">
                <div class="izquierda-arriba">
                    <table class="tabla-carrito">
                        <thead>
                            <tr>
                                <th><?php echo "Fecha: ";
                                    echo date("d-m-Y h:i:s"); ?></th>
                                <!--
                                <th>
                                    <select class="form-select" name="lista_cliente" id="lista_cliente" onchange="clienteSeleccion()">
                                        <option value="">Selecciona un cliente</option>
                                        <?php
                                        /*include("../controladores/conexion.php");
                                        $consultaClientes = "SELECT * FROM clientes";
                                        $resultadoClientes = $conexion->query($consultaClientes);
                                        while ($cliente = $resultadoClientes->fetch_assoc()) {
                                            echo '<option value="' . $cliente['id_cliente'] . '">' . $cliente['nombre'] . ' ' . $cliente['apellidos'] . '</option>';
                                        }
                                        $conexion->close();*/
                                        ?>
                                    </select>
                                </th>-->
                            </tr>
                        </thead>
                    </table>

                    <table id="tbl-carrito" class="tabla-carrito">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Pza.</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../controladores/controlador-carrito.php");
                            $total = 0;
                            $costoTotal = 0;
                            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                                foreach ($_SESSION['carrito'] as $producto) {
                                    echo "<tr>";
                                    echo "<td>" . $producto['codigo'] . "</td>";
                                    echo "<td>[" . $producto['producto'] . "] - " . $producto['descripcion'] . "</td>";
                                    echo "<td>1</td>";
                                    echo "<td>$" . $producto['precio'] . "</td>";
                                    $total += $producto['precio'];
                                    $costoTotal += $producto['costo'];
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                    <table id="tbl-total" class="tabla-carrito">
                        <thead>
                            <tr>
                                <th>Total:</th>
                                <th style="width: 100px;">$<?php echo $total; ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="izquierda-abajo">
                    <form action="../controladores/controlador-pagar.php" method="POST">
                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                        <input type="hidden" name="costo" value="<?php echo $costoTotal; ?>">
                        <button class="btn btn-success" style="width: 100%; height: 55px;" type="submit" name="btn-pagar" id="btn-pagar">PAGAR</button>
                    </form>
                </div>
            </div>
            <div class="derecha">
                <div class="derecha-arriba">
                    <button onClick="cerrarPunto()" class="btn btn-danger" type="button" id="btn-cerrar">CERRAR PUNTO DE VENTA</button>
                    <input type="text" class="form-control" name="buscador" id="buscador" placeholder="Buscar...">
                </div>
                <div class="derecha-abajo">
                    <table class="tabla-carrito">
                        <thead>
                            <tr>
                                <th style="width: 20px;">Código</th>
                                <th>Productos</th>
                                <th style="width: 20px;">Stock</th>
                                <th style="width: 20px;">Precio</th>
                                <th style="width: 20px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../controladores/conexion.php");
                            $consulta = "SELECT * FROM productos";
                            $resultado = $conexion->query($consulta);
                            while ($fila = $resultado->fetch_assoc()) {
                                echo '<tr class="articulo">';
                                echo "<td>" . $fila['codigo'] . "</td>";
                                echo "<td>[" . $fila['producto'] . "] - " . $fila['descripcion'] . "</td>";
                                echo "<td>" . $fila['stock'] . "</td>";
                                echo "<td>$" . $fila['precio'] . "</td>";
                                echo '<td>
                                        <form method="GET" action="">
                                            <button class="btn btn-primary" type="submit" name="btn-agregar" id="btn-agregar" value="' . $fila['codigo'] . '">+</button>
                                        </form>
                                      </td>';
                                echo "</tr>";
                            }
                            $conexion->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="ModalCerrarPuntoVenta" tabindex="-1" aria-labelledby="ModalCerrarPuntoVenta" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalPuntoVenta">Punto de Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <center><button type="button" class="btn btn-primary" id="btnAcceder">Cerrar</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalConfirmarVenta" tabindex="-1" aria-labelledby="ModalConfirmarVenta" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalConfirmarVenta">Confirmar Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select" name="lista_cliente" id="lista_cliente">
                            <?php
                            include("../controladores/conexion.php");
                            $consultaClientes = "SELECT * FROM clientes";
                            $resultadoClientes = $conexion->query($consultaClientes);
                            
                            while ($cliente = $resultadoClientes->fetch_assoc()) {
                                echo '<option value="' . $cliente['id_cliente'] . '">' . $cliente['nombre'] . ' ' . $cliente['apellidos'] . '</option>';
                            }
                            $conexion->close();
                            ?>
                        </select>

                        <table id="tbl-carrito" class="tabla-carrito">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th>Pza.</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $total = 0;
                                $costoTotal = 0;
                                if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                                    foreach ($_SESSION['carrito'] as $producto) {
                                        echo "<tr>";
                                        echo "<td>" . $producto['codigo'] . "</td>";
                                        echo "<td>[" . $producto['producto'] . "] - " . $producto['descripcion'] . "</td>";
                                        echo "<td>1</td>";
                                        echo "<td>$" . $producto['precio'] . "</td>";
                                        $total += $producto['precio'];
                                        $costoTotal += $producto['costo'];
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                        <table id="tbl-total" class="tabla-carrito">
                            <thead>
                                <tr>
                                    <th>Total:</th>
                                    <th style="width: 100px;">$<?php echo $total; ?></th>
                                </tr>
                            </thead>
                        </table>

                    </div>

                    <form action="../controladores/controlador-confirmar-venta.php" method="POST">
                        <input type="hidden" id="cliente_seleccionado" name="cliente_seleccionado" value="1">
                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                        <input type="hidden" name="costo" value="<?php echo $costoTotal; ?>">
                        <center><button type="submit" class="btn btn-primary" id="btnConfirmarVenta" name="btnConfirmarVenta">Confirmar Venta</button></center>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="../libs/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function cerrarPunto() {
            var modal = new bootstrap.Modal(document.getElementById('ModalCerrarPuntoVenta'));
            modal.show();

            document.getElementById('btnAcceder').addEventListener('click', function() {
                var password = document.querySelector("#ModalCerrarPuntoVenta input[type='password']").value;
                if (password === "1234") {
                    window.location.href = "../dashboard.php";
                } else {
                    alert("Contraseña incorrecta. Inténtelo de nuevo.");
                }
            });
        }


        <?php if (isset($_SESSION['confirmar_pago']) && $_SESSION['confirmar_pago'] === true) : ?>

            var modal = new bootstrap.Modal(document.getElementById('ModalConfirmarVenta'));
            modal.show();
            console.log("confirmar pago");

            <?php unset($_SESSION['confirmar_pago']); ?>
        <?php endif; ?>

        document.getElementById('lista_cliente').addEventListener('change', function() {
            document.getElementById('cliente_seleccionado').value = this.value;
            console.log("cliente: "+document.getElementById('cliente_seleccionado').value);
        });
    </script>
</body>

</html>