<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detalle de Planta</title>
  <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<header>
  <div class="container header-content">
    <div class="logo">
      <img src="{{ asset('img/logo_jardinespersonalizados.png') }}" alt="Logo de FLORGAERFRA" />
      <span class="titulo-app">FLORGAERFRA</span>
    </div>
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
  <form method="POST" action="{{ route('favoritos.agregar', $planta->id) }}">
    @csrf
    <button type="submit">
      <i class="bi bi-plus-circle me-2"></i> Agregar a mis plantas
    </button>
  </form>

  <div class="botones-extra">
    <a href="{{ route('plantasfavoritas') }}" class="btn btn-outline-success">
      <i class="bi bi-heart-fill me-2"></i> Ver Mis Plantas Favoritas
    </a>
    <a href="{{ route('resultados') }}" class="btn btn-outline-secondary">
      <i class="bi bi-arrow-left-circle me-2"></i> Volver a Resultados
    </a>
  </div>
</div>

</main>

<script>
  @if(session('success'))
    Swal.fire({
      icon: 'success',
      title: '¡Éxito!',
      text: "{{ session('success') }}",
      confirmButtonColor: '#A3B18A'
    });
  @endif
</script>
</body>
</html>