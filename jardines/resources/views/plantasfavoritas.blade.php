<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Favoritas</title>
  <link rel="shortcut icon" href="{{ asset('Img/logo_imagen.png') }}" type="image/png" />
  <link rel="stylesheet" href="{{ asset('css/misplantas.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .swal2-popup { font-size: 1rem; }
    .swal2-confirm { background-color: #dc3545 !important; }

    .btn-volver {
      font-size: 20px;
      color: #7F5539;
      text-decoration: none;
      border: 2px solid #7F5539;
      border-radius: 30px;
      padding: 6px 16px;
      transition: background-color 0.2s ease;
    }

    .btn-volver:hover {
      background-color: #7F5539;
      color: white;
    }
  </style>
</head>
<body>
<header>
  <div class="container-fluid header-content">
    <div class="logo">
      <img src="{{ asset('img/logo_jardinespersonalizados.png') }}" alt="Logo" width="40">
      <span class="titulo-app">FLORGAERFRA</span>
    </div>
  </div>
</header>

<div class="container mt-4">
  <h3 class="mb-3" style="color:#7F5539;">Mis Plantas Favoritas</h3>

  @if($plantas->isEmpty())
    <div class="alert alert-info">
      <i class="bi bi-info-circle-fill me-2"></i>
      Aún no has agregado plantas a tu lista de favoritas.
    </div>
  @endif

  <div class="plant-grid">
    @foreach($plantas as $planta)
      <div class="plant-card" data-category="{{ strtolower($planta->proposito) }}">
        <a href="{{ route('detalle.planta', $planta->id) }}" style="text-decoration: none; color: inherit;">
          <div class="plant-image">
            <img src="{{ asset('img/' . ($planta->imagen ?? 'respaldo.jpg')) }}" alt="{{ $planta->nombre }}" width="300" height="160">
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

        {{-- 
<form method="POST" action="{{ route('favoritos.eliminar', $planta->id) }}" class="form-eliminar text-center my-2">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger btn-sm w-100">
    <i class="bi bi-trash"></i> Eliminar
  </button>
</form>
--}}
      </div>
    @endforeach
  </div>
</div>

<script>
  // Eliminar con SweetAlert2
  document.querySelectorAll('.form-eliminar').forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      Swal.fire({
        title: '¿Estás seguro?',
        text: '¿Deseas eliminar esta planta de tus favoritas?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });

  // Mensaje de éxito al eliminar
  @if(session('success'))
    Swal.fire({
      icon: 'success',
      title: '¡Éxito!',
      text: "{{ session('success') }}",
      confirmButtonColor: '#28a745'
    });
  @endif
</script>
</body>
</html>
