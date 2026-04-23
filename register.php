<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="icon" type="image/gif" href="assets/img/favicon_skull3a.gif">
    <link rel="stylesheet" href="https://cdn.cursors-4u.net/cursors/animated/bobblehead-bunny-42f04b22-32.css">
    <link rel="stylesheet" href="css/register.css">
    <script src="js/auth.js?v=<?php echo time(); ?>" defer></script>
</head>
<body>

<div class="page-wrapper">
    <div class="page-border-top"></div>

    <div class="page-content">
        <div class="register-layout">
            <img src="assets/img/c07-moon_viewing-rabbit.gif" alt="rabbit" class="side-rabbit">

            <div class="box19">
                <div class="box-top">
                    <div class="u01"></div>
                </div>

                <div class="box-center">
                    <div class="box-inner">
                        <div class="login-header">
                            <h2>REGISTRO</h2>
                        </div>

                        <form id="register-form" action="php/auth_reg.php" method="POST" autocomplete="on">
                            <div class="form-group">
                                <input type="text" name="user" placeholder="Usuario" autocomplete="username" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Correo" autocomplete="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" placeholder="Contraseña" autocomplete="new-password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirmPassword" placeholder="Confirmar contraseña" autocomplete="new-password" required>
                            </div>

                            <div class="login-actions">
                                <button type="submit" class="login-btn">
                                    <img src="assets/img/25a-none.gif" alt="Registrar">
                                    <span class="btn-text">UNIRSE</span>
                                </button>
                                <a href="login.php" class="register-link">Ya tengo cuenta</a>
                            </div>
                        </form>

                        <div id="register-success" class="register-success" aria-live="polite" hidden>
                            <div class="success-headline">
                                <img src="assets/img/da07-icon-rabbit.gif" alt="icono" class="success-rabbit" id="status-rabbit">
                                <p class="snake-rainbow" id="success-text"></p>
                            </div>
                            <p class="redirect-note" id="redirect-note"></p>
                        </div>

                    </div>
                </div>

                <div class="box-bottom">
                    <div class="s01"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-border-bottom"></div>
</div>

</body>
</html>