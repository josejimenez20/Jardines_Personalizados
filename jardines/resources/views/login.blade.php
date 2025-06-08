<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('logo_jardinespersonalizados.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <title>Jardines Personalizados</title>
    <style>
        .form-group.password-wrapper {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #6c757d;
        }
    </style>
</head>
<body>

<!-- Toast personalizado -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toast-body"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
        </div>
    </div>
</div>

<div class="page">
    <div class="container" id="container">

        <!-- Panel lateral para login -->
        <div class="side-panel login-panel">
            <img src="{{ asset('Img/logo_imagen.png') }}" alt="Logo" class="logo">
            <h2>¡Hola!</h2>
            <p>Regístrese con sus datos personales para usar todas las funciones del sitio</p>
            <button class="toggle-btn" onclick="toggleForms()">Crear Cuenta</button>
        </div>

        <!-- Panel lateral para registro -->
        <div class="side-panel register-panel">
            <img src="{{ asset('Img/logo_imagen.png') }}" alt="Logo" class="logo">
            <h2>¡Bienvenido!</h2>
            <p>Inicie sesión con sus datos para acceder a sus recomendaciones personalizadas</p>
            <button class="toggle-btn" onclick="toggleForms()">Iniciar Sesión</button>
        </div>

        <!-- Formulario de Login -->
        <div class="form-container login-container">
            <div class="form-header">
                <h1>Iniciar Sesión</h1>
                <p>Accede a tu cuenta para ver tus recomendaciones</p>
            </div>
            <form method="POST" action="{{ route('login.custom') }}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                </div>
                <div class="form-group password-wrapper">
                    <input type="password" name="password" placeholder="Contraseña" id="loginPassword" required>
                    <button type="button" class="password-toggle" onclick="togglePassword('loginPassword', this)">🔒</button>
                </div>
                <button type="submit" class="btn">Iniciar Sesión</button>
            </form>
            <div class="forgot-password">
                <a href="#"></a>
            </div>
        </div>

        <!-- Formulario de Registro -->
        <div class="form-container register-container">
            <div class="form-header">
                <h1>Crear Cuenta</h1>
                <p>Comienza a recibir recomendaciones para tu jardín</p>
            </div>
            <form method="POST" action="{{ route('register.custom') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                </div>
                <div class="form-group password-wrapper">
                    <input type="password" name="password" placeholder="Contraseña" id="registerPassword" required>
                    <button type="button" class="password-toggle" onclick="togglePassword('registerPassword', this)">🔒</button>
                </div>
                <div class="form-group">
                    <select id="municipio" name="municipio" required>
                        <option value="" disabled selected hidden>Selecciona un municipio</option>
                        <!-- Opciones -->
                        <option value="Alegría">Alegría</option>
                        <option value="Berlín">Berlín</option>
                        <option value="California">California</option>
                        <option value="Concepción Batres">Concepción Batres</option>
                        <option value="El Triunfo">El Triunfo</option>
                        <option value="Ereguayquín">Ereguayquín</option>
                        <option value="Estanzuelas">Estanzuelas</option>
                        <option value="Jiquilisco">Jiquilisco</option>
                        <option value="Jucuapa">Jucuapa</option>
                        <option value="Jucuarán">Jucuarán</option>
                        <option value="Mercedes Umaña">Mercedes Umaña</option>
                        <option value="Nueva Granada">Nueva Granada</option>
                        <option value="Ozatlán">Ozatlán</option>
                        <option value="Puerto El Triunfo">Puerto El Triunfo</option>
                        <option value="San Agustín">San Agustín</option>
                        <option value="San Buenaventura">San Buenaventura</option>
                        <option value="San Dionisio">San Dionisio</option>
                        <option value="San Francisco Javier">San Francisco Javier</option>
                        <option value="Santa Elena">Santa Elena</option>
                        <option value="Santa María">Santa María</option>
                        <option value="Santiago de María">Santiago de María</option>
                        <option value="Tecapán">Tecapán</option>
                        <option value="Usulután">Usulután</option>
                    </select>
                </div>
                <p class="note">Podés personalizar más tus recomendaciones después</p>
                <button type="submit" class="btn">Registrarme</button>
            </form>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleForms() {
        document.getElementById('container').classList.toggle('show-register');
    }

 function togglePassword(id, button) {
    const input = document.getElementById(id);
    if (input.type === "password") {
        input.type = "text";
        button.textContent = "🔓"; // candado abierto
    } else {
        input.type = "password";
        button.textContent = "🔒"; // candado cerrado
    }
}
// Mostrar toast si hay mensaje de sesión (Laravel)Add commentMore actions
    window.addEventListener('DOMContentLoaded', () => {
        const toastElement = document.getElementById('liveToast');
        const toastBody = document.getElementById('toast-body');

        <?php if (session('error')): ?>
            toastElement.classList.remove('bg-success');
            toastElement.classList.add('bg-danger');
            toastBody.textContent = "{{ session('error') }}";
            new bootstrap.Toast(toastElement).show();
        <?php elseif (session('success')): ?>
            toastElement.classList.remove('bg-danger');
            toastElement.classList.add('bg-success');
            toastBody.textContent = "{{ session('success') }}";
            new bootstrap.Toast(toastElement).show();
        <?php endif; ?>
    });
</script>

</body>
</html>
