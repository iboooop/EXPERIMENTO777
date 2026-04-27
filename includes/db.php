<?php
// Reemplaza el host con el Endpoint que te dio AWS RDS
$host = 'tu-base-de-datos.xxxxxxx.us-east-1.rds.amazonaws.com';
$db   = 'bnuuys';
$user = 'admin'; // O el master username que le pusiste al crear el RDS
$pass = 'Admin12345'; // La contraseña del RDS
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERR_STREAM => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     echo json_encode(['success' => false, 'message' => 'Error de conexión RDS: ' . $e->getMessage()]);
     exit;
}
?>