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

    <title>CLIENTES</title>
</head>

<body class="body-pnt">
    <div class="container-fluid">
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title" style="margin-top:1rem; margin-bottom:1rem;">
                    <i class="fa-solid fa-user pe-2"></i> CLIENTES ACTIVOS
                </h5>
                <div class="buscador">
                    <input type="text" class="form-control" name="buscador" id="buscador" placeholder="Buscar...">
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col" style="width: 20px;"><button class="btn btn-success" type="button" onclick="nuevoCliente()">AGREGAR</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //include("controladores/controlador-eliminar.php");
                        include("controladores/conexion.php");

                        $consulta = "SELECT * FROM clientes";
                        $resultado = $conexion->query($consulta);

                        while ($fila = $resultado->fetch_assoc()) {
                            echo '<tr class="articulo">';
                            echo "<td> " . $fila['id_cliente'] . "</td>";
                            echo "<td> " . $fila['nombre'] . " </td>";
                            echo "<td> " . $fila['apellidos'] . " </td>";
                            echo '<td>' . $fila['direccion'] . '</td>';
                            echo "<td>" . $fila['telefono'] . "</td>";
                            echo    '<td>
                                <button class="btn btn-primary" name="btn-editar" data-id="' . $fila['id_cliente'] . '" onclick="editarCliente('.$fila['id_cliente'].')">EDITAR</button>
                                <div>
                                    <button class="btn btn-danger" type="button" onclick="confirmarEliminarCliente('.$fila['id_cliente'].')">ELIMINAR</button>
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


    <div class="modal fade" id="modalNuevoCliente" tabindex="-1" aria-labelledby="modalNuevoUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNuevoUsuarioLabel">Nuevo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes agregar los campos del formulario para agregar un nuevo usuario -->
                    <form method="POST" action="controladores/controlador-agregar-cliente.php">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
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

    <!-- Modal Editar Usuario -->
    <div class="modal fade" id="modalEditarCliente" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes agregar los campos del formulario para editar un usuario -->
                    <form id="formEditarUsuario" method="GET" action="controladores/controlador-update.php">
                        <div class="mb-3">
                            <label for="idEditar" class="form-label">Id de cliente:</label>
                            <input type="number" class="form-control" id="idEditar" name="idEditar" readonly="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombreEditar" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreEditar" name="nombreEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidosEditar" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidosEditar" name="apellidosEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccionEditar" class="form-label">Direccion</label>
                            <input type="text" class="form-control" id="direccionEditar" name="direccionEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefonoEditar" class="form-label">Telefono</label>
                            <input type="number" class="form-control" id="telefonoEditar" name="telefonoEditar" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="libs/script.js"></script>

</body>

</html>