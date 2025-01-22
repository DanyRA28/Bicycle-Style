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
                    <i class="fa-solid fa-user pe-2"></i> USUARIOS ACTIVOS
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
                            <th scope="col">Usuario</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col" style="width: 20px;"><button class="btn btn-success" type="button" onclick="nuevoUsuario()">AGREGAR</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //include("controladores/controlador-eliminar.php");
                        include("controladores/conexion.php");

                        $consulta = "SELECT * FROM usuarios";
                        $resultado = $conexion->query($consulta);

                        while ($fila = $resultado->fetch_assoc()) {
                            echo '<tr class="articulo">';
                            echo "<td> " . $fila['id_usuario'] . "</td>";
                            echo "<td> " . $fila['usuario'] . " </td>";
                            //echo "<td> " . $fila['password'] . " </td>";
                            echo "<td> " . str_repeat('*', strlen($fila['password'])) . " </td>";

                            
                            echo    '<td>
                                <button class="btn btn-primary" name="btn-editar" data-id="' . $fila['id_usuario'] . '" onclick="editarUsuario('.$fila['id_usuario'].')">EDITAR</button>
                                <div>
                                    <button class="btn btn-danger" type="button" onclick="confirmarEliminarUsuario('.$fila['id_usuario'].')">ELIMINAR</button>
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


    <div class="modal fade" id="modalNuevoUsuario" tabindex="-1" aria-labelledby="modalNuevoUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNuevoUsuarioLabel">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes agregar los campos del formulario para agregar un nuevo usuario -->
                    <form method="POST" action="controladores/controlador-agregar-usuario.php">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEliminarUsuario" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
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
    <div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes agregar los campos del formulario para editar un usuario -->
                    <form id="formEditarUsuario" method="GET" action="controladores/controlador-update-usuario.php">
                        <div class="mb-3">
                            <label for="idEditar" class="form-label">Id de usuario:</label>
                            <input type="number" class="form-control" id="idEditar" name="idEditar" readonly="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="usuarioEditar" class="form-label">Usuario:</label>
                            <input type="text" class="form-control" id="usuarioEditar" name="usuarioEditar" required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordEditar" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="passwordEditar" name="passwordEditar" required>
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