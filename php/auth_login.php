<?php
session_start();
require_once '../includes/db.php';

// Detectamos si la petición viene vía AJAX (desde tu auth.js)
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if ($isAjax) {
    header('Content-Type: application/json; charset=UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Usamos los nombres 'user' y 'pass' que tienes en tu HTML
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    try {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData && password_verify($pass, $userData['password'])) {
            // ¡ÉXITO! Guardamos los datos en la sesión
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['username'] = $userData['username'];

            if ($isAjax) {
                echo json_encode([
                    'success' => true,
                    'redirect' => 'roulette.php' // CAMBIADO A .PHP
                ]);
                exit();
            }

            header("Location: ../roulette.php"); // CAMBIADO A .PHP
            exit();
        } else {
            // FALLO DE CREDENCIALES
            if ($isAjax) {
                http_response_code(401);
                echo json_encode([
                    'success' => false,
                    'message' => 'Usuario o contraseña incorrectos.'
                ]);
                exit();
            }

            echo "<script>
                    alert('Usuario o contraseña incorrectos.');
                    window.location.href = '../login.php';
                  </script>";
            exit();
        }
    } catch (PDOException $e) {
        if ($isAjax) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Error en el servidor.'
            ]);
            exit();
        }

        die("Error en el sistema: " . $e->getMessage());
    }
}

// Si alguien intenta entrar a este archivo sin ser POST
if ($isAjax) {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Método no permitido.'
    ]);
}
?>