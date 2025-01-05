<?php
// procesar.php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'] ?? null;
    $apellidos = $_POST['apellidos'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $nacionalidad = $_POST['nacionalidad'] ?? null;
    $escuela = $_POST['escuela'] ?? null;
    $estado_origen = $_POST['estado_origen'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    // Verificar la conexión a la base de datos
    if ($conn) {
        try {
            // Insertar los datos en la tabla
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

            // Confirmación
            echo "<h1>Datos guardados exitosamente.</h1>";
            echo "<a href='index.php'>Volver al formulario</a>";
        } catch (PDOException $e) {
            // Mostrar errores si ocurren
            echo "<h1>Error: " . $e->getMessage() . "</h1>";
        }
    } else {
        echo "<h1>Error: No se pudo conectar a la base de datos.</h1>";
    }
} else {
    echo "<h1>Acceso no permitido.</h1>";
}
