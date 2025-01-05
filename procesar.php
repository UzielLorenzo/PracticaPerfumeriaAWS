<?php
require_once 'db.php';
require_once 'fpdf.php'; // Incluimos la librería FPDF

// Mostrar errores para depurar
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? null;
    $apellidos = $_POST['apellidos'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $nacionalidad = $_POST['nacionalidad'] ?? null;
    $escuela = $_POST['escuela'] ?? null;
    $estado_origen = $_POST['estado_origen'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    try {
        // Verificamos la conexión
        if ($conn) {
            // Insertamos los datos en la base de datos
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

            // Generamos el PDF
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(40, 10, 'Formulario de Registro');
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

            // Enviamos el PDF como descarga
            $pdf->Output('D', 'Formulario_Registro.pdf');
        } else {
            echo "Error: No se pudo conectar a la base de datos.";
        }
    } catch (Exception $e) {
        echo "Ocurrió un error: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud no permitido.";
}

