<?php
// db.php
// Archivo para conectar con la base de datos PostgreSQL

$host = 'TU_ENDPOINT_DE_RDS';
$db = 'perfumeria_db';
$user = 'AdminPerfumeria';
$pass = 'TU_CONTRASEÑA';
$port = '5432';

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?>
