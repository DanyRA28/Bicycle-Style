<?php

require('fpdf/fpdf.php');

//reporte de ventas
if ($_GET['opc'] == 1) {
    class PDF extends FPDF

    {
        // Page header
        function Header()
        {
            // Arial bold 15
            $this->SetFont('Arial', 'B', 15);

            // Título
            $this->Cell(0, 10, 'BICYCLE STYLE', 0, 1, 'C');
            $this->Ln(10); // Añade espacio después del título

            // Encabezado de la tabla
            $this->Cell(15, 10, '#', 1, 0, 'C');
            $this->Cell(40, 10, 'Fecha', 1, 0, 'C');
            $this->Cell(115, 10, 'Cliente', 1, 0, 'C');
            $this->Cell(35, 10, 'Total', 1, 0, 'C');
            $this->Cell(35, 10, 'Costo', 1, 0, 'C');
            $this->Cell(35, 10, 'Ganancia', 1, 1, 'C');
        }


        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' / Bicycle Style', 0, 0, 'C');
        }
    }

    $conn = mysqli_connect("localhost", "root", "", "piloto");
    if (!$conn) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    //$sql = "SELECT * FROM ventas";
    $sql = "SELECT ventas.id_venta, ventas.fecha, CONCAT(clientes.nombre, ' ', clientes.apellidos) AS nombre_cliente, ventas.total, ventas.costo
    FROM ventas
    INNER JOIN clientes ON ventas.id_cliente = clientes.id_cliente ORDER BY id_venta ASC";
    $result = mysqli_query($conn, $sql);


    $pdf = new PDF('L');
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 16);




    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(15, 10, $row['id_venta'], 1, 0, 'C', 0);
        $pdf->Cell(40, 10, $row['fecha'], 1, 0, 'C', 0);
        $pdf->Cell(115, 10, $row['nombre_cliente'], 1, 0, 'C', 0);
        $pdf->Cell(35, 10, $row['total'], 1, 0, 'C', 0);
        $pdf->Cell(35, 10, $row['costo'], 1, 0, 'C', 0);

        $ganancia = $row['total'] - $row['costo'];

        $pdf->Cell(35, 10, $ganancia, 1, 1, 'C', 0);
    }


    $pdf->Output('reporte_ventas.pdf', 'D');

    
} elseif ($_GET['opc'] == 2) {
    // reporte de productos

    class PDF extends FPDF

    {
        // Page header
        function Header()
        {
            // Arial bold 15
            $this->SetFont('Arial', 'B', 12);

            // Título
            $this->Cell(0, 10, 'BICYCLE STYLE', 0, 1, 'C');
            $this->Ln(10); // Añade espacio después del título

            // Encabezado de la tabla
            $this->Cell(25, 10, 'Codigo', 1, 0, 'C');
            $this->Cell(55, 10, 'Producto', 1, 0, 'C');
            $this->Cell(120, 10, 'Descripcion', 1, 0, 'C');
            $this->Cell(25, 10, 'Stock', 1, 0, 'C');
            $this->Cell(25, 10, 'Costo', 1, 0, 'C');
            $this->Cell(25, 10, 'Precio', 1, 1, 'C');
        }


        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' / Bicycle Style', 0, 0, 'C');
        }
    }

    $conn = mysqli_connect("localhost", "root", "", "piloto");
    if (!$conn) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    //$sql = "SELECT * FROM ventas";
    $sql = "SELECT * FROM productos";
    $result = mysqli_query($conn, $sql);


    $pdf = new PDF('L');
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);


    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(25, 10, $row['codigo'], 1, 0, 'C', 0);
        $pdf->Cell(55, 10, $row['producto'], 1, 0, 'C', 0);
        $pdf->Cell(120, 10, $row['descripcion'], 1, 0, 'C', 0);
        $pdf->Cell(25, 10, $row['stock'], 1, 0, 'C', 0);
        $pdf->Cell(25, 10, $row['costo'], 1, 0, 'C', 0);
        $pdf->Cell(25, 10, $row['precio'], 1, 1, 'C', 0);
    }

    $pdf->Output('reporte_productos.pdf', 'D');


}elseif($_GET['opc'] == 3){

// reporte de clientes
class PDF extends FPDF

{
    // Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);

        // Título
        $this->Cell(0, 10, 'BICYCLE STYLE', 0, 1, 'C');
        $this->Ln(10); // Añade espacio después del título

        // Encabezado de la tabla
        $this->Cell(15, 10, '#', 1, 0, 'C');
        $this->Cell(60, 10, 'Nombres', 1, 0, 'C');
        $this->Cell(60, 10, 'Apellidos', 1, 0, 'C');
        $this->Cell(105, 10, 'Direccion', 1, 0, 'C');
        $this->Cell(35, 10, 'Telefono', 1, 1, 'C');
    }


    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' / Bicycle Style', 0, 0, 'C');
    }
}

$conn = mysqli_connect("localhost", "root", "", "piloto");
if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

//$sql = "SELECT * FROM ventas";
$sql = "SELECT * FROM clientes";
$result = mysqli_query($conn, $sql);


$pdf = new PDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 16);




while ($row = $result->fetch_assoc()) {
    $pdf->Cell(15, 10, $row['id_cliente'], 1, 0, 'C', 0);
    $pdf->Cell(60, 10, $row['nombre'], 1, 0, 'C', 0);
    $pdf->Cell(60, 10, $row['apellidos'], 1, 0, 'C', 0);
    $pdf->Cell(105, 10, $row['direccion'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['telefono'], 1, 1, 'C', 0);
}


$pdf->Output('reporte_clientes.pdf', 'D');

}
