<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FLORGAERFRA</title>
  <link rel="shortcut icon" href="/JARDINES_PERSONALIZADOS/Img/logo_jardinespersonalizados.png" type="image/png">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
  <header class="header">
</header>

  <main class="main-content">
    <img src="{{ asset('Img/logo_imagen.png') }}" alt="">
    <h1>¡Bienvenido/a {{ Auth::user()->name }} a FLORGAERFRA!</h1>
    <p class="subtitle">Tu asistente personal para crear el jardín perfecto</p>
    <p>Comienza obteniendo recomendaciones personalizadas de plantas</p>
    <button type="button" class="btn" onclick="redirectToStart()">Recomendación de especies</button>
  </main>

  <script>
    function redirectToStart() {
      window.location.href = "{{ route('pantalla_inicio') }}";
    }
  </script>
</body>
</html>
