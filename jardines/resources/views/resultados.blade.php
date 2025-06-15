<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recomendaciones de Plantas</title>
  <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">

  <!-- Bootstrap + AlertifyJS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <style>
    .ajs-message.ajs-success {
      background-color: #28a745 !important;
      color: white !important;
    }
    .icono-favorito {
      color: #e76f51;
      cursor: pointer;
      font-size: 22px;
      margin-left: 10px;
      transition: transform 0.2s;
    }
    .icono-favorito:hover {
      transform: scale(1.2);
    }
    .favorito-wrapper {
      display: flex;
      justify-content: start;
      align-items: center;
      margin-top: 8px;
    }
  </style>
</head>
<body>
  <header>
    <div class="container header-content">
      <div class="logo">
        <img src="{{ asset('img/logo_jardinespersonalizados.png') }}" alt="Logo" />
        <span class="titulo-app">FLORGAERFRA</span>
      </div>
      <nav>
        <ul>
          <li><button id="btn-inicio">Inicio</button></li>
          <li><button id="btn-favoritos">Favoritas</button></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container mt-4">
    @if(isset($mensaje))
      <div class="filter-message" id="mensaje-filtros">
        {{ $mensaje }}
      </div>
    @endif

    <div class="filter-count mb-3">
      {{ count($plantas) }} plantas encontradas
    </div>

    <div class="plant-grid">
      @forelse($plantas as $planta)
        <div class="plant-card" data-category="{{ strtolower($planta->proposito) }}">
          <a href="{{ route('detalle.planta', $planta->id) }}" style="text-decoration: none; color: inherit;">
            <div class="plant-image">
              @if ($planta->imagen)
                <img src="{{ asset('img/' . $planta->imagen) }}" alt="{{ $planta->nombre }}" width="300" height="160">
              @else
                <img src="{{ asset('img/respaldo.jpg') }}" alt="Sin imagen" width="300" height="160">
              @endif
            </div>
            <div class="plant-info">
              <div class="plant-name">{{ $planta->nombre }}</div>
              <div class="plant-scientific"><em>{{ $planta->nombre_cientifico }}</em></div>
              <div class="plant-tags">
                <span class="plant-tag">{{ $planta->exposicion_luz }}</span>
                <span class="plant-tag">{{ $planta->tipo_suelo }}</span>
                <span class="plant-tag">{{ $planta->frecuencia_agua }} agua</span>
              </div>
            </div>
          </a>

          <div class="favorito-wrapper">
            <form onsubmit="agregarFavorito(event, {{ $planta->id }})">
              @csrf
              <button type="submit" class="btn btn-link p-0 m-0" style="text-decoration: none;">
                <i class="bi bi-heart-fill icono-favorito" title="Agregar a favoritos"></i>
              </button>
            </form>
          </div>
        </div>
      @empty
        <div class="alert alert-danger d-flex align-items-center" role="alert">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>
          No se encontraron plantas para tu municipio.
        </div>
      @endforelse
    </div>
  </div>

  <script>
    document.getElementById('btn-inicio').addEventListener('click', function () {
      window.location.href = "{{ route('pantalla_inicio') }}";
    });

    document.getElementById('btn-favoritos').addEventListener('click', function () {
      window.location.href = "{{ route('plantasfavoritas') }}";
    });

   function agregarFavorito(event, plantaId) {
    event.preventDefault();

    fetch(`/favoritos/${plantaId}`, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.estado === 'agregado') {
        alertify.success('Planta añadida a tus favoritas');
      } else if (data.estado === 'existe') {
        alertify.error('Esta planta ya esta en tus favoritas');
      } else {
        alertify.error('Ocurrió un error al procesar la solicitud');
      }
    })
    .catch(error => {
      console.error(error);
      alertify.error("Ocurrió un error al agregar.");
    });
  }

    @if(session('alerta_municipio'))
      alertify.success("{{ session('alerta_municipio') }}");
    @endif

    @if(session('alerta_filtros'))
      alertify.success("{{ session('alerta_filtros') }}");
    @endif
  </script>
</body>
</html>
