<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FLORGAERFRA</title>
  <link rel="shortcut icon" href="{{ asset('Img/logo_imagen.png') }}" type="image/png" />
  <link rel="stylesheet" href="{{ asset('css/pantalla_inicio.css') }}" />
</head>
<body>
  <header>
    <div class="container header-content">
      <div class="logo">
        <img src="{{ asset('Img/logo_jardinespersonalizados.png') }}" alt="Logo de FLORGAERFRA" />
        <span class="titulo-app">FLORGAERFRA</span>
      </div>
      <nav>
        <ul>
          <li><button id="btn-inicio">Inicio</button></li>
          <li><button id="btn-recomendaciones">Recomendaciones</button></li>
          <li><button id="btn-cuenta">Mi cuenta</button></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="main-content">
    <h1>🌿 Recomendación de especies para tu jardín</h1>
    <p class="info-text">
      Basado en tu ubicación ({{ $municipio->nombre }}),<br />
      te recomendamos especies para clima {{ strtolower($municipio->clima) }}.<br />
      ¿Deseas ajustar los filtros manualmente?
    </p>

    <div class="toggle-buttons">
      <button type="button" class="btn btn-primary" onclick="redirectToRegister()">Sí, ajustar filtros</button>
      <button type="button" class="btn btn-secondary" onclick="redirectToHome()">No, continuar</button>
    </div>

    <form class="reco-form">
      <label for="suelo">Tipo de suelo</label>
      <input type="text" id="suelo" value="{{ $municipio->tipo_suelo }}" readonly />

      <label for="agua">Disponibilidad de agua</label>
      <input type="text" id="agua" value="{{ $municipio->frecuencia_agua }}" readonly />

      <label for="luz">Exposición a la luz</label>
      <input type="text" id="luz" value="{{ $municipio->exposicion_luz }}" readonly />

      <label for="espacio">Tamaño del espacio</label>
      <select id="espacio" disabled>
        <option value="mediano">Mediano (5-20m²)</option>
      </select>

      <label for="proposito">Propósito (opcional)</label>
      <input type="text" id="proposito" value="{{ $municipio->proposito }}" readonly />
    </form>
  </main>

  <script>
    document.getElementById('btn-inicio').addEventListener('click', () => {
      window.location.href = "{{ route('pantalla_inicio') }}";
    });

    document.getElementById('btn-recomendaciones').addEventListener('click', () => {
      window.location.href = "{{ route('recomen') }}";
    });

    document.getElementById('btn-cuenta').addEventListener('click', () => {
      window.location.href = "{{ route('mi_perfil') }}";
    });

    function redirectToHome() {
      window.location.href = "{{ route('resultados') }}";
    }

    function redirectToRegister() {
      window.location.href = "{{ route('sobre') }}";
    }
  </script>
</body>
</html>
