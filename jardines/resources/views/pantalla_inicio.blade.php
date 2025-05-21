<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Florgaerfra</title>
  <link rel="shortcut icon" href="/Img/logo_imagen.png" type="image/png">
  <link rel="stylesheet" href="{{ asset('css/pantalla_inicio.css') }}" />
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

  <main>
    <h1>Recomendación de especies para tu jardín</h1>
    <p>Basado en tu ubicación<br>
    Te recomendamos especies para clima tropical cálido.<br>
    ¿Deseas ajustar los filtros manualmente?</p>
    
    <div class="toggle-buttons">
      <button type="button" class="btn" onclick="redirectToRegister()">si</button>
      <button type="button" class="btn" onclick="redirectToHome()">no</button>
    </div>
    
    <form>
      <label for="suelo">Tipo de suelo</label>
      <input type="text" id="suelo" placeholder="Arenoso" value="Arenoso" readonly />

      <label for="agua">Disponibilidad de agua</label>
      <input type="text" id="agua" placeholder="Moderada" value="Moderada" readonly />
      
      <label for="luz">Exposición a la luz</label>
      <input type="text" id="luz" placeholder="Sol pleno" value="Sol pleno" readonly />
      
      <label for="espacio">Tamaño del espacio</label>
      <select id="espacio" disabled>
          <option value="mediano">Mediano (5-20m²)</option>
      </select>

      <label for="proposito">Propósito (opcional)</label>
      <input type="text" id="proposito" placeholder="Decorativas" value="Decorativas" />
    </form>
  </main>

  <script>
    // Manejo de navegación
    document.getElementById('btn-inicio').addEventListener('click', function() {
      window.location.href = "{{ route('pantalla_inicio') }}";
    });
    
    document.getElementById('btn-recomendaciones').addEventListener('click', function() {
      window.location.href = "{{ route('recomen') }}";
    });
    
    document.getElementById('btn-cuenta').addEventListener('click', function() {
      window.location.href = "{{ route('mi_perfil') }}";
    });
    
    function redirectToHome() {
      // Boton "no" redirige a la página de resultados
      window.location.href = "{{ route('resultados') }}";
    }
    
    function redirectToRegister() {
      // Boton "si" redirige a la página de registro
      window.location.href = "{{ route('sobre') }}";
    }
  </script>
</body>
</html>