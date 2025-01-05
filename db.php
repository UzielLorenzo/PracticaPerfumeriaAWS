<?php
// Archivo para conectar con la base de datos PostgreSQL
$host = 'perfumeria-db.c9cqgowoy3k1.us-east-2.rds.amazonaws.com';
$dbname = 'perfumeria_db';
$username = 'AdminPerfumeria';
$password = 'MiContrasenaSegura2025';

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
