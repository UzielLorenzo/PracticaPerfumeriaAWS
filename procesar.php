<?php
// procesar.php

// Incluir el archivo de conexión a la base de datos
include 'db.php';

try {
    // Preparar la consulta SQL usando PDO
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellidos, edad, nacionalidad, escuela, estado_origen, telefono) VALUES (:nombre, :apellidos, :edad, :nacionalidad, :escuela, :estado_origen, :telefono)");
    
    // Asociar los valores del formulario a los parámetros de la consulta
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellidos', $_POST['apellidos']);
    $stmt->bindParam(':edad', $_POST['edad']);
    $stmt->bindParam(':nacionalidad', $_POST['nacionalidad']);
    $stmt->bindParam(':escuela', $_POST['escuela']);
    $stmt->bindParam(':estado_origen', $_POST['estado_origen']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    echo "Datos guardados correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>
