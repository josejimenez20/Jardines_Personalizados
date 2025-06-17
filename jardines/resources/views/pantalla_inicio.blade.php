<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Florgaerfra</title>
  <link rel="shortcut icon" href="{{ asset('Img/logo_imagen.png') }}" type="image/png" />
  <link rel="stylesheet" href="{{ asset('css/pantalla_inicio.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
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
          <li><button id="btn-cuenta">Mi perfil</button></li>
          <li><button id="btn-cerrar">Cerrar sesión</button></li>
        </ul>
      </nav>
      <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </header>

  <main class="main-content">
    <h1>Recomendación de especies para tu jardín</h1>

    @if(isset($municipio))
      <p class="info-text">
        Basado en tu ubicación {{ $municipio->nombre }}<br />
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

        <label for="espacio">Tamaño de jardín ideal para ti</label>
        <input type="text" id="espacio" value="{{ $plantaReferencia->tamano_espacio ?? 'No disponible' }}" readonly />
      </form>
    @else
      <p class="info-text">
        No se pudo cargar la información del municipio. Por favor, revisa tu perfil o contacta al administrador.
      </p>
    @endif
  </main>

  <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
    document.getElementById('btn-cuenta').addEventListener('click', () => {
      window.location.href = "{{ route('mi_perfil') }}";
    });

    document.getElementById('btn-cerrar').addEventListener('click', (e) => {
      e.preventDefault();
      alertify.confirm(
        'Cerrar sesión',
        '¿Estás seguro de que deseas cerrar sesión?',
        function() {
          document.getElementById('logoutForm').submit();
        },
        function() {
          alertify.error('Cancelado');
        }
      );
    });

    function redirectToHome() {
      window.location.href = "{{ route('resultados') }}";
    }

    function redirectToRegister() {
      window.location.href = "{{ route('sobre') }}";
    }

    //Gráfica animada con colores según nivel
    document.addEventListener('DOMContentLoaded', async () => {
      const suelo = document.getElementById('suelo')?.value;
      const agua = document.getElementById('agua')?.value;
      const luz = document.getElementById('luz')?.value;
      const espacio = document.getElementById('espacio')?.value;

      if (!suelo || !agua || !luz || !espacio) return;

      try {
        const response = await fetch('http://localhost:3000/analisis', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ suelo, agua, luz, espacio })
        });

        const { porcentaje } = await response.json();

        let color = '#dc3545'; // rojo
        if (porcentaje >= 75) color = '#28a745'; // verde
        else if (porcentaje >= 50) color = '#ffc107'; // amarillo

        const barra = document.createElement('div');
        barra.innerHTML = `
          <p style="margin-top: 30px; font-weight: bold;">Nivel de compatibilidad con tu jardín:</p>
          <div style="background: #ccc; border-radius: 10px; overflow: hidden; width: 100%; height: 30px;">
            <div style="width: 0%; height: 100%; background: ${color}; text-align: center; color: white; line-height: 30px; transition: width 1.5s;" id="barraCompatibilidad">
              0%
            </div>
          </div>
        `;
        document.querySelector('.main-content').appendChild(barra);

        setTimeout(() => {
          const barraInterna = document.getElementById('barraCompatibilidad');
          barraInterna.style.width = porcentaje + '%';
          barraInterna.innerText = porcentaje + '%';
        }, 400);
      } catch (error) {
        console.error('Error al obtener análisis:', error);
      }
    });
  </script>
</body>
</html>
