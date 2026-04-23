<?php
require_once '../includes/db.php';
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['user'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = $_POST['pass'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if ($user === '' || $email === '' || $pass === '' || $confirmPassword === '') {
        echo json_encode(['success' => false, 'message' => 'DATOS INCOMPLETOS']);
        exit;
    }

    if ($pass !== $confirmPassword) {
        echo json_encode(['success' => false, 'message' => 'CLAVES DIFERENTES']);
        exit;
    }

    try {
        // Verificar si existe el usuario
        $check = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $check->execute([$user, $email]);
        
        if ($check->rowCount() > 0) {
            echo json_encode(['success' => false, 'message' => 'USUARIO EN USO']);
            exit;
        }

        $pass_hashed = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user, $email, $pass_hashed]);

        echo json_encode(['success' => true, 'message' => 'CUENTA CREADA']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'ERROR DE RED']);
    }
    exit;
}
?>