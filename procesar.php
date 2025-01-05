<?php
// procesar.php
// Procesa los datos enviados desde el formulario y los guarda en la base de datos

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $nacionalidad = $_POST['nacionalidad'];
    $escuela = $_POST['escuela'];
    $estado_origen = $_POST['estado_origen'];
    $telefono = $_POST['telefono'];

    try {
        $sql = "INSERT INTO registros (nombre, apellidos, edad, nacionalidad, escuela, estado_origen, telefono) VALUES (:nombre, :apellidos, :edad, :nacionalidad, :escuela, :estado_origen, :telefono)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':apellidos' => $apellidos,
            ':edad' => $edad,
            ':nacionalidad' => $nacionalidad,
            ':escuela' => $escuela,
            ':estado_origen' => $estado_origen,
            ':telefono' => $telefono
        ]);

        echo "<h2>Registro exitoso</h2>";
    } catch (PDOException $e) {
        echo "Error al guardar los datos: " . $e->getMessage();
    }
}
?>
