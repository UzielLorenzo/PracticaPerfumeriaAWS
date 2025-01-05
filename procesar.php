<?php
// procesar.php
require_once 'db.php';
require_once 'fpdf.php';  // Incluimos la librería FPDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'] ?? null;
    $apellidos = $_POST['apellidos'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $nacionalidad = $_POST['nacionalidad'] ?? null;
    $escuela = $_POST['escuela'] ?? null;
    $estado_origen = $_POST['estado_origen'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    try {
        // Verificar la conexión a la base de datos
        if ($conn) {
            // Insertar los datos en la base de datos
            $sql = "INSERT INTO formulario (nombre, apellidos, edad, nacionalidad, escuela, estado_origen, numero_telefono) 
                    VALUES (:nombre, :apellidos, :edad, :nacionalidad, :escuela, :estado_origen, :telefono)";
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

            // Generar el PDF usando FPDF
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, 'Formulario de Registro', 0, 1, 'C');
            $pdf->SetFont('Arial', '', 12);
            $pdf->Ln(10);
            $pdf->Cell(50, 10, 'Nombre:', 0, 0);
            $pdf->Cell(0, 10, $nombre, 0, 1);
            $pdf->Cell(50, 10, 'Apellidos:', 0, 0);
            $pdf->Cell(0, 10, $apellidos, 0, 1);
            $pdf->Cell(50, 10, 'Edad:', 0, 0);
            $pdf->Cell(0, 10, $edad, 0, 1);
            $pdf->Cell(50, 10, 'Nacionalidad:', 0, 0);
            $pdf->Cell(0, 10, $nacionalidad, 0, 1);
            $pdf->Cell(50, 10, 'Escuela:', 0, 0);
            $pdf->Cell(0, 10, $escuela, 0, 1);
            $pdf->Cell(50, 10, 'Estado de Origen:', 0, 0);
            $pdf->Cell(0, 10, $estado_origen, 0, 1);
            $pdf->Cell(50, 10, 'Teléfono:', 0, 0);
            $pdf->Cell(0, 10, $telefono, 0, 1);

            // Descargar el PDF automáticamente
            $pdf->Output('D', 'Formulario_Registro.pdf');
        } else {
            echo "Error: No se pudo conectar a la base de datos.";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
}
?>

