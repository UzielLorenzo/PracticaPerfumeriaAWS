<?php
require_once 'db.php';
require_once 'fpdf/fpdf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? null;
    $apellidos = $_POST['apellidos'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $nacionalidad = $_POST['nacionalidad'] ?? null;
    $escuela = $_POST['escuela'] ?? null;
    $estado_origen = $_POST['estado_origen'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    try {
        // Inserta los datos en la base de datos
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

        // Genera el PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Datos de Registro');
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, "Nombre: $nombre");
        $pdf->Ln();
        $pdf->Cell(40, 10, "Apellidos: $apellidos");
        $pdf->Ln();
        $pdf->Cell(40, 10, "Edad: $edad");
        $pdf->Ln();
        $pdf->Cell(40, 10, "Nacionalidad: $nacionalidad");
        $pdf->Ln();
        $pdf->Cell(40, 10, "Escuela: $escuela");
        $pdf->Ln();
        $pdf->Cell(40, 10, "Estado de Origen: $estado_origen");
        $pdf->Ln();
        $pdf->Cell(40, 10, "Teléfono: $telefono");
        $pdf->Ln();

        // Descargar el PDF
        $pdf->Output('D', 'Registro.pdf');
    } catch (PDOException $e) {
        echo "Error al guardar los datos: " . $e->getMessage();
    }
}
?>
