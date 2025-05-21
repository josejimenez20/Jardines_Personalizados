<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Florgaerfra</title>
  <link rel="shortcut icon" href="/Img/logo_imagen.png" type="image/png">
  <link rel="stylesheet" href="{{ asset('css/sobre.css') }}" />
</head>
<body>
  <header>
    <div class="container">
      <div class="header-content">
        <!-- Logo completamente al borde izquierdo -->
        <div class="logo">
           <img src="{{ asset('Img/logo_jardinespersonalizados.png') }}" alt="Logo" class="logo">
          <span class="titulo-app">FLORGAERFRA</span>
        </div>
        
        <div class="nav-user-container">
          <nav>
            <ul>
              <li><button id="btn-inicio">Inicio</button></li>
              <li><button id="btn-recomendaciones">Recomendaciones</button></li>
              <li><button id="btn-cuenta">Mi cuenta</button></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <h2>Cuéntanos sobre tu jardín</h2>

    <h3>¿Qué tipo de clima tiene?</h3>
    <div class="options">
      <button>Tropical cálido</button>
      <button>Templado</button>
      <button>Frío</button>
      <button>Desértico</button>
    </div>

    <h3>¿Qué tipo de suelo tiene?</h3>
    <div class="options">
      <button>Arenoso</button>
      <button>Arcilloso</button>
      <button>Fértil</button>
      <button>No sé</button>
    </div>

    <h3>¿Cuánta luz solar recibe tu jardín?</h3>
    <div class="options">
      <button>Sol pleno</button>
      <button>Semi-sombra</button>
      <button>Sombra</button>
    </div>

    <h3>¿Con qué frecuencia puedes regar?</h3>
    <div class="options">
      <button>Diariamente</button>
      <button>Moderado</button>
      <button>Poca frecuencia</button>
    </div>

    <h3>¿Qué tipo de plantas te interesan?</h3>
    <div class="options">
      <button>Ornamentales</button>
      <button>Medicinales</button>
      <button>Frutales</button>
      <button>Suculentas</button>
    </div>

    <button type="button" class="submit-button" onclick="redirectToRegister()">Ver recomendaciones</button>
  </div>

  <script>
    // Navegación entre pantallas
    document.getElementById('btn-inicio').addEventListener('click', function() {
      window.location.href = "{{ route('pantalla_inicio') }}";
    });

    document.getElementById('btn-recomendaciones').addEventListener('click', function() {
      window.location.href = "{{ route('recomen') }}";
    });

    document.getElementById('btn-cuenta').addEventListener('click', function() {
      window.location.href = "{{ route('mi_perfil') }}";
    });

    function redirectToRegister() {
      window.location.href = "{{ route('resultados') }}";
    }

    // Selección de botones estilo 'radio' visual
    document.querySelectorAll('.options').forEach(group => {
      group.addEventListener('click', function (e) {
        if (e.target.tagName === 'BUTTON') {
          // Quita la clase 'selected' a todos los botones del grupo
          group.querySelectorAll('button').forEach(btn => btn.classList.remove('selected'));
          // Agrega la clase 'selected' al botón clicado
          e.target.classList.add('selected');
        }
      });
    });
  </script>
</body>
</html>
