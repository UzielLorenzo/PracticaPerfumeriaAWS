<?php
// procesar.php

// Incluir la conexión a la base de datos
include 'db.php';

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$nacionalidad = $_POST['nacionalidad'];
$escuela = $_POST['escuela'];
$estado_origen = $_POST['estado_origen'];
$telefono = $_POST['telefono'];

// Preparar la consulta SQL
$query = "INSERT INTO usuarios (nombre, apellidos, edad, nacionalidad, escuela, estado_origen, telefono) 
          VALUES ('$nombre', '$apellidos', '$edad', '$nacionalidad', '$escuela', '$estado_origen', '$telefono')";

// Ejecutar la consulta
if (pg_query($conn, $query)) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . pg_last_error($conn);
}

// Cerrar la conexión
pg_close($conn);
?>
