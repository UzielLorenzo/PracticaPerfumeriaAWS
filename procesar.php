<?php
// procesar.php
require_once 'db.php';
require_once 'fpdf.php';

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

            // Crear PDF usando FPDF
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(40, 10, 'Formulario de Registro');
            $pdf->Ln();
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, "Nombre: $nombre", 0, 1);
            $pdf->Cell(0, 10, "Apellidos: $apellidos", 0, 1);
            $pdf->Cell(0, 10, "Edad: $edad", 0, 1);
            $pdf->Cell(0, 10, "Nacionalidad: $nacionalidad", 0, 1);
            $pdf->Cell(0, 10, "Escuela: $escuela", 0, 1);
            $pdf->Cell(0, 10, "Estado de Origen: $estado_origen", 0, 1);
            $pdf->Cell(0, 10, "Número de Teléfono: $telefono", 0, 1);
            $pdf->Output('D', 'Formulario_Registro.pdf');
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

