<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detalle de Planta</title>
  <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
</head>
<body>
<header>
    <div class="container header-content">
      <div class="logo">
        <img src="{{ asset('img/logo_jardinespersonalizados.png') }}" alt="Logo de FLORGAERFRA" />
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

  <main>
    <div class="imagen-planta">
      <img src="{{ asset('img/' . $planta->imagen) }}" alt="{{ $planta->nombre }}">
      <div class="recomendaciones">
        <h4>¿Por qué te la recomendamos?</h4>
        <ul>
          <li>Ideal para clima {{ strtolower($planta->clima) }}</li>
          <li>Prefiere suelo {{ strtolower($planta->tipo_suelo) }}</li>
          <li>Necesita exposición: {{ $planta->exposicion_luz }}</li>
        </ul>
      </div>
    </div>

    <div class="contenido">
      <h2>Detalle de Planta</h2>
      <h3>{{ $planta->nombre }}</h3>
      <p><i>Nombre científico: {{ $planta->nombre_cientifico }}</i></p>

      <div class="tags">
        <span>{{ ucfirst($planta->proposito) }}</span>
        <span>{{ ucfirst($planta->exposicion_luz) }}</span>
        <span>{{ ucfirst($planta->tipo_suelo) }}</span>
      </div>

      <div class="descripcion">
        <h4>Descripción</h4>
        <p>{{ $planta->descripcion }}</p>
      </div>

      <section class="cuidados">
        <h4>Cuidados principales</h4>
        <ol>
          <li>Riego {{ $planta->frecuencia_agua }}</li>
          <li>{{ ucfirst($planta->exposicion_luz) }}</li>
          <li>Clima {{ $planta->clima }}</li>
        </ol>
      </section>

      <div class="boton-agregar">
        <button onclick="alert('¡{{ $planta->nombre }} ha sido agregada a tus plantas!')">Agregar a mis plantas</button>
      </div>
    </div>
  </main>
    <script>
    document.getElementById('btn-inicio').addEventListener('click', () => {
      window.location.href = "{{ route('pantalla_inicio') }}";
    });

    document.getElementById('btn-recomendaciones').addEventListener('click', () => {
      window.location.href = "{{ route('resultados') }}";
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
