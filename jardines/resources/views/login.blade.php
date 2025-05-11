<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('logo_jardinespersonalizados.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <title>Jardines Personalizados</title>
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
                <div class="form-group">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn">Iniciar Sesión</button>
            </form>
            <div class="forgot-password">
                <a href="#">¿Olvidaste tu contraseña?</a>
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
                <div class="form-group">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                    <select id="municipio" name="municipio" required>
                        <option value="" disabled selected hidden>Selecciona un municipio</option>
                        <option value="alegria">Alegría</option>
                        <option value="berlin">Berlín</option>
                        <option value="california">California</option>
                        <option value="concepcion_batres">Concepción Batres</option>
                        <option value="el_triunfo">El Triunfo</option>
                        <option value="ereguyquin">Ereguayquín</option>
                        <option value="estanzuelas">Estanzuelas</option>
                        <option value="jiquilisco">Jiquilisco</option>
                        <option value="jucuapa">Jucuapa</option>
                        <option value="jucuarán">Jucuarán</option>
                        <option value="mercedes_umana">Mercedes Umaña</option>
                        <option value="nueva_granada">Nueva Granada</option>
                        <option value="ozatlan">Ozatlán</option>
                        <option value="puerto_el_triunfo">Puerto El Triunfo</option>
                        <option value="san_agustin">San Agustín</option>
                        <option value="san_buenaventura">San Buenaventura</option>
                        <option value="san_dionisio">San Dionisio</option>
                        <option value="san_francisco_javier">San Francisco Javier</option>
                        <option value="santa_elena">Santa Elena</option>
                        <option value="santa_maria">Santa María</option>
                        <option value="santiago_de_maria">Santiago de María</option>
                        <option value="tecapán">Tecapán</option>
                        <option value="usulutan">Usulután</option>
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
        const container = document.getElementById('container');
        container.classList.toggle('show-register');
    }

    // Mostrar toast si hay mensaje de sesión (Laravel)
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
