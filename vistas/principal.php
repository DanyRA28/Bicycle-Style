<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- librerias para exportar a excel -->
    <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>


    <link href="DataTables/datatables.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0 illustration">
                    <div class="card-body p-0 d-flex flex-fill">
                        <div class="row g-0 w-100" id="prueba">
                            <div class="col-6">
                                <div class="p-3 m-1">
                                    <h4>Bienvenido al Inicio</h4>
                                    <p class="mb-0">Da click en ver para ver el detalle de la venta</p>
                                </div>
                            </div>
                            <div class="col-6 align-self-end text-end">
                                <img src="img/customer-support.jpg" class="img-fluid illustration-img" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1" id="prueba2">
                                <h4 class="mb-2">
                                    INFORMACION DE VENTAS
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title">
                    VENTAS
                </h5>
                <h6 class="card-subtitle text-muted">
                    REPORTE
                </h6>
            </div>
            <div class="card-body">
                <table class="table" id="tabla">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Fecha</th>
                            <th scope="col" class="text-center">Cliente</th>
                            <th scope="col" class="text-center">Total</th>
                            <th scope="col" class="text-center">Costo</th>
                            <th scope="col" class="text-center">Ganancia</th>
                            <th scope="col" class="text-center">Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("controladores/conexion.php");

                        $consulta = "SELECT ventas.id_venta, ventas.fecha, CONCAT(clientes.nombre, ' ', clientes.apellidos) AS nombre_cliente, ventas.total, ventas.costo
             FROM ventas
             INNER JOIN clientes ON ventas.id_cliente = clientes.id_cliente ORDER BY id_venta ASC";
                        $resultado = $conexion->query($consulta);

                        while ($fila = $resultado->fetch_assoc()) {
                            $ganancia = $fila['total'] - $fila['costo'];

                            echo '<tr>';
                            echo '<td class="text-center"> ' . $fila['id_venta'] . "</td>";
                            echo '<td class="text-center"> ' . $fila['fecha'] . " </td>";
                            echo '<td class="text-center"> ' . $fila['nombre_cliente'] . " </td>";
                            echo '<td class="text-center">' . $fila['total'] . '</td>';
                            echo '<td class="text-center">' . $fila['costo'] . '</td>';
                            echo '<td class="text-center">' . $ganancia . '</td>';
                            echo '<td class="text-center"> <button class="btn btn-warning" name="btn-editar" data-id="' . $fila['id_venta'] . '" onclick="mostrarProductos(' . $fila['id_venta'] . ')">VER</button> </td>';
                            echo '</tr>';
                        }
                        $conexion->close();
                        ?>
                    </tbody>
                </table>

                <table class="table" id="tabla1" hidden="1">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Total</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Ganancia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("controladores/conexion.php");

                        $consulta = "SELECT ventas.id_venta, ventas.fecha, CONCAT(clientes.nombre, ' ', clientes.apellidos) AS nombre_cliente, ventas.total, ventas.costo
             FROM ventas
             INNER JOIN clientes ON ventas.id_cliente = clientes.id_cliente ORDER BY id_venta ASC";
                        $resultado = $conexion->query($consulta);

                        while ($fila = $resultado->fetch_assoc()) {
                            $ganancia = $fila['total'] - $fila['costo'];

                            echo '<tr>';
                            echo "<td> " . $fila['id_venta'] . "</td>";
                            echo "<td> " . $fila['fecha'] . " </td>";
                            echo "<td> " . $fila['nombre_cliente'] . " </td>";
                            echo '<td>' . $fila['total'] . '</td>';
                            echo '<td>' . $fila['costo'] . '</td>';
                            echo '<td>' . $ganancia . '</td>';
                            echo '</tr>';
                        }
                        $conexion->close();
                        ?>
                    </tbody>
                </table>


                <div class="card-footer text-center">
                    <a href="PDF.php?opc=1"><button class="btn btn-primary" id="btnPDF">Exportar a PDF</button></a>
                    <button class="btn btn-success" id="btnExportar">Exportar a Excel</button>
                </div>


            </div>
        </div>
    </div>

    <script src="DataTables/datatables.min.js"></script>

    <script>
        var table = new DataTable('#tabla', {
            language: {
                url: 'DataTables/ES.json',
            },
        });

        const $btnExportar = document.querySelector("#btnExportar"),
            $tabla = document.querySelector("#tabla1");

        $btnExportar.addEventListener("click", function() {
            let tableExport = new TableExport($tabla, {
                exportButtons: false, // No queremos botones
                filename: "reporte_ventas", //Nombre del archivo de Excel
                sheetname: "Ventas", //Título de la hoja
            });
            let datos = tableExport.getExportData();
            let preferenciasDocumento = datos.tabla1.xlsx;
            tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
        });
    </script>

</body>

</html>