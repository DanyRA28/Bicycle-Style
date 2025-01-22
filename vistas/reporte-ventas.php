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


    <!--  librerias para pdf que no funcionaron
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
-->
    <link href="DataTables/datatables.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">

        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header text-center">
                <a href="PDF.php?opc=1"><button class="btn btn-primary" id="btnPDF">Exportar a PDF</button></a>
                <button class="btn btn-success" id="btnExportar">Exportar a Excel</button>
            </div>
            <div class="card-body">
                <table class="table" id="tabla">
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





            </div>
        </div>
    </div>

    <!-- libreria JS para DataTable-->
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

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