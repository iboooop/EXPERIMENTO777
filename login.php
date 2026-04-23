<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/gif" href="assets/img/favicon_skull3a.gif">
    <link rel="stylesheet" href="https://cdn.cursors-4u.net/cursors/animated/bobblehead-bunny-42f04b22-32.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/auth.js?v=<?php echo time(); ?>" defer></script>
</head>
<body>
<div class="page-wrapper">
    <div class="page-border-top"></div>
    <div class="page-content">
        <div class="box19">
            <div class="corner-rabbits">
                <img src="assets/img/ja01-icon-rabbit.gif" alt="rabbit izq">
                <img src="assets/img/ja03-icon-rabbit.gif" alt="rabbit der">
            </div>
            <div class="box-top"><div class="u01"></div></div>
            <div class="box-center">
                <div class="box-inner">
                    <div class="login-header"><h2>INGRESO</h2></div>
                    
                    <form id="login-form" action="php/auth_login.php" method="POST" autocomplete="on">
                        <div class="form-group">
                            <input type="text" name="user" id="user" placeholder="Usuario" autocomplete="username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" id="pass" placeholder="Contraseña" autocomplete="current-password" required>
                        </div>
                        <div class="login-actions">
                            <button type="submit" class="login-btn">
                                <img src="assets/img/25a-none.gif" alt="Entrar">
                                <span class="btn-text">ENTRAR</span>
                            </button>
                            <a href="register.php" class="register-link">Crear cuenta</a>
                        </div>
                    </form>

                    <div id="login-error" class="login-error" aria-live="polite" hidden>
                        <div class="login-error-headline">
                            <p class="snake-invalid" id="login-error-text"></p>
                            <img src="assets/img/da01-icon-rabbit.gif" alt="icono de error" class="invalid-rabbit">
                        </div>
                    </div>

                </div>
            </div>
            <div class="box-bottom"><div class="s01"></div></div>
        </div>
    </div>
    <div class="page-border-bottom"></div>
</div>
</body>
</html>