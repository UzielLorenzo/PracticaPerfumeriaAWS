<?php
require_once 'db.php';
require('fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? null;
    $apellidos = $_POST['apellidos'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $nacionalidad = $_POST['nacionalidad'] ?? null;
    $escuela = $_POST['escuela'] ?? null;
    $estado_origen = $_POST['estado_origen'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    try {
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

        // Generar PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Datos del Registro');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, "Nombre: $nombre", 0, 1);
        $pdf->Cell(0, 10, "Apellidos: $apellidos", 0, 1);
        $pdf->Cell(0, 10, "Edad: $edad", 0, 1);
        $pdf->Cell(0, 10, "Nacionalidad: $nacionalidad", 0, 1);
        $pdf->Cell(0, 10, "Escuela: $escuela", 0, 1);
        $pdf->Cell(0, 10, "Estado de Origen: $estado_origen", 0, 1);
        $pdf->Cell(0, 10, "Teléfono: $telefono", 0, 1);
        $pdf->Output('D', 'registro.pdf');

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
