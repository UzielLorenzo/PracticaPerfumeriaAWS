<?php
// db.php
$host = 'perfumeria-db.c9cqgowoy3k1.us-east-2.rds.amazonaws.com';
$db = 'perfumeria_db';
$user = 'AdminPerfumeria';
$pass = 'MiContrasenaSegura2025';
$port = '5432';

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?>
