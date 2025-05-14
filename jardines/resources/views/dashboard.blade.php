<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FLORGAERFRA</title>
    <link rel="shortcut icon" href="/JARDINES_PERSONALIZADOS/Img/logo_jardinespersonalizados.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
</head>
<body>
<header>
    <div class="logo-container">
        <img src="{{ asset('Img/logo_jardinespersonalizados.png') }}" alt="Logo" class="logo">
        <div class="logo">FLORGAERFRA</div>
    </div>
    <nav>
        <ul>
            <p>{{ Auth::user()->name }}</p>
        </ul>
    </nav>
    <div class="icon">👤</div>
</header>

<div class="main-content">
    <div class="main-icon">🌱</div>
    <h1>¡Bienvenido/a {{ Auth::user()->name }} a FLORGAERFRA!</h1>
    <bp>Tu asistente personal para crear el jardín perfecto</bp>
    <p>Comienza obteniendo recomendaciones personalizadas de plantas</p>
    <button type="button" class="btn" onclick="redirectToRegister()">Recomendación de especies</button>
</div>

<script>
  function redirectToRegister() {
    window.location.href = "{{ route('pantalla_inicio') }}";
  }
</script>
</body>
</html>

