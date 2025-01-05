<?php
require_once 'db.php';
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? null;
    $apellidos = $_POST['apellidos'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $nacionalidad = $_POST['nacionalidad'] ?? null;
    $escuela = $_POST['escuela'] ?? null;
    $estado_origen = $_POST['estado_origen'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    if ($conn) {
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

        // Crear el PDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $html = "<h1>Registro Guardado</h1>";
        $html .= "<p><strong>Nombre:</strong> $nombre</p>";
        $html .= "<p><strong>Apellidos:</strong> $apellidos</p>";
        $html .= "<p><strong>Edad:</strong> $edad</p>";
        $html .= "<p><strong>Nacionalidad:</strong> $nacionalidad</p>";
        $html .= "<p><strong>Escuela:</strong> $escuela</p>";
        $html .= "<p><strong>Estado de Origen:</strong> $estado_origen</p>";
        $html .= "<p><strong>Número de Teléfono:</strong> $telefono</p>";

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Descargar el PDF
        $dompdf->stream("registro_$nombre.pdf", ["Attachment" => true]);

        echo "Datos guardados exitosamente y PDF generado.";
    } else {
        echo "Error: No se pudo conectar a la base de datos.";
    }
}
?>
