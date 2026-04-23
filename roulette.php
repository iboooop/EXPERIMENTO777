<?php
session_start(); // ESTO DEBE SER LO PRIMERO EN EL ARCHIVO
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Si no está logueado, lo echa al login
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruleta</title>
    <link rel="icon" type="image/gif" href="assets/img/favicon_skull3a.gif">
    <link rel="stylesheet" href="https://cdn.cursors-4u.net/cursors/animated/bobblehead-bunny-42f04b22-32.css">
    <link rel="stylesheet" href="css/roulette.css">
    <script src="js/auth.js" defer></script>
    <script src="js/roulette.js" defer></script>
</head>
<body>
<div class="page-wrapper">
    <div class="page-border-top"></div>
    <div class="page-content">
        <div class="roulette-layout">
            
            <div class="welcome-header">
                <div class="welcome-top-row">
                    <div class="welcome-plate-wrap">
                        <img src="assets/img/pf006-plate-f01.gif" alt="placa bienvenida" class="welcome-plate">
                        <h2 class="welcome-title">BIENVENIDO, <span class="username" id="logged-username"><?php echo htmlspecialchars($username); ?></span></h2>
                    </div>
                </div>

                <a href="php/logout.php" class="logout-btn" style="text-decoration: none;">
                    <img src="assets/img/25a-none.gif" alt="Cerrar sesión">
                    <span class="btn-text">SALIR</span>
                </a>

                <div class="extra-rabbits">
                    <img src="assets/img/hdb06-icon-rabbit.gif" alt="conejo 1" class="stack-rabbit">
                    <img src="assets/img/hd06-icon-rabbit.gif" alt="conejo 2" class="stack-rabbit">
                </div>
            </div>

            <div class="box19">
                <div class="box-top"><div class="u01"></div></div>
                <div class="box-center">
                    <div class="box-inner">
                        
                        <div class="plate-name-container">
                            <h2 class="rabbit-name" id="rabbit-breed"></h2>
                        </div>

                        <div class="carousel">
                            <button class="arrow-btn" id="prev">
                                <img src="assets/img/ka01-icon-arrow.gif" alt="anterior">
                            </button>
                            <div class="rabbit-photo">
                                <img src="assets/bnuuys/default.gif" alt="conejo" id="rabbit-img">
                            </div>
                            <button class="arrow-btn" id="next">
                                <img src="assets/img/kb01-icon-arrow.gif" alt="siguiente">
                            </button>
                        </div>

                        <div class="info-banner">
                            <div class="plate-details-container">
                                <img src="assets/img/pb01-icon-rabbit.gif" alt="icon" class="info-rabbit-right">
                                <div class="details-inner-text">
                                    <p class="rabbit-desc" id="rabbit-description"></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="box-bottom"><div class="s01"></div></div>
            </div>

            <img src="assets/img/ja21-icon-rabbit.gif" alt="bailando" class="side-rabbit-right">
        </div>
    </div>
    <div class="page-border-bottom"></div>
</div>
</body>
</html>