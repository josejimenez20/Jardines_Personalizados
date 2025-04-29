<?php
session_start();
$nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Invitado';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>FLORGAERFRA</title>
  <link rel="shortcut icon" href="/Img/logo_imagen.png" type="image/png">
  <link rel="stylesheet" href="inicio.css">
</head>
<body>
  <header>
    <div class="logo-container">
      <img src="/JARDINES_PERSONALIZADOS/Img/logo_jardinespersonalizados.png" alt="Logo de FLORGAERFRA" class="logo-img">
      <div class="logo">FLORGAERFRA</div>
    </div>
    <nav>
      <ul>
        <p><?php echo htmlspecialchars($nombreUsuario); ?></p>
      </ul>
    </nav>
    <div class="icon">👤</div>
  </header>

  <div class="main-content">
    <div class="main-icon">🌱</div>
    <h1>¡Bienvenido a FLORGAERFRA!</h1>
    <bp>Tu asistente personal para crear el jardín perfecto</bp>
    <p>Comienza obteniendo recomendaciones personalizadas de plantas</p>
    <button type="button" class="btn" onclick="redirectToRegister()">Recomendación de especies</button>

    <script>
      function redirectToRegister() {
        window.location.href = '../Pantalla_Inicio/incioPrincipal.html';
      }
    </script>
</body>
</html>
