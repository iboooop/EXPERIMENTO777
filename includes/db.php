<?php
$host = 'localhost';
$db   = 'bnuuy';
$user = 'root';
$pass = ''; // En WAMP suele estar vacío

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // Esto hace que si hay un error, PHP te avise claramente
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>