<?php
require_once 'db.php';
require_once 'fpdf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mostrar los datos recibidos
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Verifica si los datos están completos
    $nombre = $_POST['nombre'] ?? null;
    $apellidos = $_POST['apellidos'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $nacionalidad = $_POST['nacionalidad'] ?? null;
    $escuela = $_POST['escuela'] ?? null;
    $estado_origen = $_POST['estado_origen'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    if ($nombre && $apellidos && $edad && $nacionalidad && $escuela && $estado_origen && $telefono) {
        echo "Los datos se recibieron correctamente.";
    } else {
        echo "Faltan algunos datos.";
    }
}
?>
