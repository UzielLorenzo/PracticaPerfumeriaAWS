<?php
// procesar.php
require_once 'db.php';
require_once 'fpdf.php'; // Incluir la librería FPDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? null;
    $apellidos = $_POST['apellidos'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $nacionalidad = $_POST['nacionalidad'] ?? null;
    $escuela = $_POST['escuela'] ?? null;
    $estado_origen = $_POST['estado_origen'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    try {
        if ($conn) {
            // Insertar los datos en la base de datos
            $sql = "INSERT INTO formulario (nombre, apellidos, edad, nacionalidad, escuela, estado_origen, numero_telefono) VALUES (:nombre, :apellidos, :edad, :nacionalidad, :escuela, :estado_origen, :telefono)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':apellidos' => $apellidos,
                ':edad' => $edad,
                ':nacionalidad' => $nacionalidad,
                ':escuela' => $escuela,
                ':estado_origen' => $estado_origen,
                ':telefono' => $telefono,
            ]);

            // Generar el PDF con FPDF
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, 'Formulario de Registro', 0, 1, 'C');
            $pdf->Ln(10);

            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(50, 10, 'Nombre:', 1);
            $pdf->Cell(140, 10, $nombre, 1);
            $pdf->Ln();
            $pdf->Cell(50, 10, 'Apellidos:', 1);
            $pdf->Cell(140, 10, $apellidos, 1);
            $pdf->Ln();
            $pdf->Cell(50, 10, 'Edad:', 1);
            $pdf->Cell(140, 10, $edad, 1);
            $pdf->Ln();
            $pdf->Cell(50, 10, 'Nacionalidad:', 1);
            $pdf->Cell(140, 10, $nacionalidad, 1);
            $pdf->Ln();
            $pdf->Cell(50, 10, 'Escuela:', 1);
            $pdf->Cell(140, 10, $escuela, 1);
            $pdf->Ln();
            $pdf->Cell(50, 10, 'Estado de Origen:', 1);
            $pdf->Cell(140, 10, $estado_origen, 1);
            $pdf->Ln();
            $pdf->Cell(50, 10, 'Telefono:', 1);
            $pdf->Cell(140, 10, $telefono, 1);

            // Descargar el PDF
            $pdf->Output('D', 'formulario_registro.pdf');
        } else {
            echo "Error: No se pudo conectar a la base de datos.";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error general: " . $e->getMessage();
    }
}
?>
