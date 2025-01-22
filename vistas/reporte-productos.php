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

    <!-- libreria para DataTable-->
    <link href="DataTables/datatables.min.css" rel="stylesheet">
    <!--  librerias para pdf que no funcionaron
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
-->


</head>

<body>

    <div class="container-fluid">

        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header text-center">
                <a href="PDF.php?opc=2"><button class="btn btn-primary" id="btnPDF">Exportar a PDF</button></a>
                <button class="btn btn-success" id="btnExportar">Exportar a Excel</button>
            </div>
            <div class="card-body">
                <table class="table" id="tabla">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("controladores/conexion.php");

                        $consulta = "SELECT * FROM productos";
                        $resultado = $conexion->query($consulta);

                        while ($fila = $resultado->fetch_assoc()) {
                            echo '<tr>';
                            echo "<td> " . $fila['codigo'] . "</td>";
                            echo "<td> " . $fila['producto'] . " </td>";
                            echo "<td> " . $fila['descripcion'] . " </td>";
                            echo '<td>' . $fila['stock'] . '</td>';
                            echo '<td>' . $fila['costo'] . '</td>';
                            echo '<td>' . $fila['precio'] . '</td>';
                            echo '</tr>';
                        }
                        $conexion->close();
                        ?>
                    </tbody>
                </table>

                <table class="table" id="tabla1" hidden="1">

                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("controladores/conexion.php");

                        $consulta = "SELECT * FROM productos";
                        $resultado = $conexion->query($consulta);

                        while ($fila = $resultado->fetch_assoc()) {

                            echo '<tr>';
                            echo "<td> " . $fila['codigo'] . "</td>";
                            echo "<td> " . $fila['producto'] . " </td>";
                            echo "<td> " . $fila['descripcion'] . " </td>";
                            echo '<td>' . $fila['stock'] . '</td>';
                            echo '<td>' . $fila['costo'] . '</td>';
                            echo '<td>' . $fila['precio'] . '</td>';
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
                filename: "reporte_productos", //Nombre del archivo de Excel
                sheetname: "Productos", //Título de la hoja
            });
            let datos = tableExport.getExportData();
            let preferenciasDocumento = datos.tabla1.xlsx;
            tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
        });
    </script>

</body>

</html>