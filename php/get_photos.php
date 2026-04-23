<?php
require_once '../includes/db.php'; // Asegúrate que la ruta a db.php sea correcta

try {
    // Usamos ORDER BY RAND() para que sea al azar como querías
    $stmt = $pdo->query("SELECT breed, description, image_url FROM rabbits ORDER BY RAND()");
    $rabbits = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($rabbits);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Error de BD: " . $e->getMessage()]);
}
?>