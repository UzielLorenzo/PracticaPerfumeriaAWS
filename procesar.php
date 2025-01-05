<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? null;
    $apellidos = $_POST['apellidos'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $nacionalidad = $_POST['nacionalidad'] ?? null;
    $escuela = $_POST['escuela'] ?? null;
    $estado_origen = $_POST['estado_origen'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    if ($conn) {
        $sql = "INSERT INTO registros (nombre, apellidos, edad, nacionalidad, escuela, estado_origen, telefono) VALUES (:nombre, :apellidos, :edad, :nacionalidad, :escuela, :estado_origen, :telefono)";
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

        echo "Datos guardados exitosamente.";
    } else {
        echo "Error: No se pudo conectar a la base de datos.";
    }
}
?>
