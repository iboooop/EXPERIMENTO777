document.addEventListener('DOMContentLoaded', () => {
    initRegisterFlow();
    initLoginFlow();
});

function buildSnakeText(targetElement, text, palette, delayStep) {
    targetElement.innerHTML = '';
    [...text].forEach((char, index) => {
        const span = document.createElement('span');
        const color = palette[index % palette.length];

        span.className = char === ' ' ? 'snake-char snake-space' : 'snake-char';
        span.textContent = char;
        span.style.color = color;
        span.style.animationDelay = `${index * delayStep}s`;

        targetElement.appendChild(span);
    });
}

function initRegisterFlow() {
    const registerForm = document.getElementById('register-form');
    const successPanel = document.getElementById('register-success');
    const successText = document.getElementById('success-text');
    const redirectNote = document.getElementById('redirect-note');
    const statusRabbit = document.getElementById('status-rabbit');

    if (!registerForm || !successPanel || !successText || !redirectNote) return;

    const rainbowPalette = ['#ff9ab0', '#ffb6c1', '#ffd3a4', '#ffe089', '#b7e7ba', '#a9dcff', '#c9c2ff'];
    const errorPalette = ['#d3384b', '#e04657', '#f05b6a', '#ff7a87', '#b8444a'];

    registerForm.addEventListener('submit', async (event) => {
        event.preventDefault(); 

        const formData = new FormData(registerForm);
        const pass = String(formData.get('pass') || '');
        const confirmPassword = String(formData.get('confirmPassword') || '');

        if (pass !== confirmPassword) {
            alert('Las contraseñas no coinciden.');
            return;
        }

        try {
            const response = await fetch(registerForm.action, {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            const data = await response.json();

            registerForm.hidden = true;
            successPanel.hidden = false;

            if (data.success) {
                // Éxito: Arcoíris
                statusRabbit.src = 'assets/img/da07-icon-rabbit.gif';
                buildSnakeText(successText, data.message.toUpperCase(), rainbowPalette, 0.08);
                redirectNote.textContent = 'Redirigiendo al login en 3 segundos...';
                setTimeout(() => window.location.replace('login.php'), 3000);
            } else {
                // Error en registro: Rojo
                statusRabbit.src = 'assets/img/da01-icon-rabbit.gif';
                buildSnakeText(successText, data.message.toUpperCase(), errorPalette, 0.08);
                redirectNote.textContent = 'Por favor, intenta de nuevo.';
                setTimeout(() => {
                    successPanel.hidden = true;
                    registerForm.hidden = false;
                }, 3500);
            }
        } catch (error) {
            alert('Error al registrar.');
        }
    });
}

function initLoginFlow() {
    const loginForm = document.getElementById('login-form');
    const loginError = document.getElementById('login-error');
    const loginErrorText = document.getElementById('login-error-text');

    if (!loginForm || !loginError || !loginErrorText) return;

    const invalidPalette = ['#d3384b', '#e04657', '#f05b6a', '#ff7a87', '#b8444a'];

    loginForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        loginError.hidden = true;

        const formData = new FormData(loginForm);

        try {
            const response = await fetch(loginForm.action, {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            const data = await response.json();

            if (data.success) {
                window.location.replace(data.redirect || 'roulette.php');
            } else {
                loginError.hidden = false;
                // AQUÍ ESTÁ EL CAMBIO: Forzamos el texto exacto que pediste
                buildSnakeText(loginErrorText, 'CREDENCIALES INVÁLIDAS', invalidPalette, 0.07);
            }
        } catch (error) {
            loginError.hidden = false;
            // Por si hay fallo de red, también dirá credenciales inválidas para no romper la estética
            buildSnakeText(loginErrorText, 'CREDENCIALES INVÁLIDAS', invalidPalette, 0.07);
        }
    });
}