<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="estilos/style.css" rel="stylesheet">
    <link href="libs/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="libs/js/bootstrap.min.js"></script>

    <link href="DataTables/datatables.min.css" rel="stylesheet">

    <title>INVENTARIO</title>
</head>

<body class="body-pnt">

    <!--
    <section id="inventario">
        <div class="card border-0">
            <div class="container-inventario">

                <div class="buscador">
                    <input type="text" class="form-control" name="buscador" id="buscador" placeholder="Buscar...">
                </div>

                <div class="">
                    <table class="table" id="listaProductos">
                        <thead>
                            <tr>
                                <th style="width: 20px;">Codigo</th>
                                <th>Producto</th>
                                <th>Descripcion</th>
                                <th style="width: 20px;">Stock</th>
                                <th style="width: 40px;">Precio</th>
                                <th style="width: 20px;"><button class="btn btn-success" type="button" onclick="nuevoUsuario">COMPRAR</button></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //include("controladores/controlador-eliminar.php");
                            /*
                            include("controladores/conexion.php");

                            $consulta = "SELECT * FROM productos";
                            $resultado = $conexion->query($consulta);

                            while ($fila = $resultado->fetch_assoc()) {
                                echo '<tr class="articulo">';
                                echo "<td> " . $fila['codigo'] . "</td>";
                                echo "<td> " . $fila['producto'] . " </td>";
                                echo "<td> " . $fila['descripcion'] . " </td>";
                                echo '<td>' . $fila['stock'] . '</td>';
                                echo "<td>" . $fila['precio'] . "</td>";
                                echo    '<td>
                                <button class="btn btn-primary" name="btn-stock" id="btn-stock" value="' . $fila['codigo'] . '">EDITAR</button>
                                <div>
                                    <button class="btn btn-danger" type="button" onclick="confirmarEliminarProducto('.$fila['codigo'].')">ELIMINAR</button>
                                </div>
                                </td>';
                                echo '</tr>';
                            }
                            $conexion->close();*/
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
                        -->

    <div class="container-fluid">
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title" style="margin-top:1rem; margin-bottom:1rem;">
                    <i class="fa-solid fa-tag pe-2"></i> Productos
                </h5>
            </div>
            <div class="card-body">
                <table class="table" id="tabla">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Costo</th>
                            <th scope="col" style="width: 20px;"><button class="btn btn-success" type="button" onclick="nuevoProducto()">AGREGAR</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //include("controladores/controlador-eliminar.php");
                        include("controladores/conexion.php");

                        $consulta = "SELECT * FROM productos";
                        $resultado = $conexion->query($consulta);

                        while ($fila = $resultado->fetch_assoc()) {
                            echo '<tr class="articulo">';
                            echo "<td> " . $fila['codigo'] . "</td>";
                            echo "<td> " . $fila['producto'] . " </td>";
                            echo "<td> " . $fila['descripcion'] . " </td>";
                            echo '<td>' . $fila['stock'] . '</td>';
                            echo "<td>" . $fila['precio'] . "</td>";
                            echo "<td>" . $fila['costo'] . "</td>";
                            echo    '<td>
                                <button class="btn btn-primary" name="btn-editar" data-id="' . $fila['codigo'] . '" onclick="editarProducto(' . $fila['codigo'] . ')">EDITAR</button>
                                <div>
                                    <button class="btn btn-danger" type="button" onclick="confirmarEliminarProducto(' . $fila['codigo'] . ')">ELIMINAR</button>
                                </div>
                                </td>';
                            echo '</tr>';
                        }
                        $conexion->close();
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalNuevoProducto" tabindex="-1" aria-labelledby="modalNuevoUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNuevoUsuarioLabel">Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="controladores/controlador-agregar-producto.php">
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Codigo</label>
                            <input type="number" class="form-control" id="codigo" name="codigo" required>
                        </div>
                        <div class="mb-3">
                            <label for="producto" class="form-label">Producto</label>
                            <input type="text" class="form-control" id="producto" name="producto" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="costo" class="form-label">Costo</label>
                            <input type="number" class="form-control" id="costo" name="costo" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEliminarProd" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea eliminar el registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="btnConfirmarEliminar">Sí</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar producto -->
    <div class="modal fade" id="modalEditarProducto" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes agregar los campos del formulario para editar un producto -->
                    <form id="formEditarUsuario" method="GET" action="controladores/controlador-update-producto.php">
                        <div class="mb-3">
                            <label for="codigoEditar" class="form-label">Codigo:</label>
                            <input type="text" class="form-control" id="codigoEditar" name="codigoEditar" readonly="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="productoEditar" class="form-label">Producto:</label>
                            <input type="text" class="form-control" id="productoEditar" name="productoEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcionEditar" class="form-label">Descripcion:</label>
                            <input type="text" class="form-control" id="descripcionEditar" name="descripcionEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="stockEditar" class="form-label">Stock:</label>
                            <input type="number" class="form-control" id="stockEditar" name="stockEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="costoEditar" class="form-label">Costo</label>
                            <input type="number" class="form-control" id="costoEditar" name="costoEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="precioEditar" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precioEditar" name="precioEditar" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="libs/script.js"></script>

    <script src="DataTables/datatables.min.js"></script>

    <script>
        var table = new DataTable('#tabla', {
            language: {
                url: 'DataTables/ES.json',
            },
        });
    </script>


</body>

</html>