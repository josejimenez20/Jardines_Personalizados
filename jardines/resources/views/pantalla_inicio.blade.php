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
        
        <!-- Nav y usuario completamente al borde derecho -->
        <div class="nav-user-container">
          <nav>
            <ul>
              <li><button id="btn-inicio" class="active">Inicio</button></li>
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
      <input type="text" id="suelo" placeholder="Arenoso" />
      
      <label for="agua">Disponibilidad de agua</label>
      <input type="text" id="agua" placeholder="Moderada" />
      
      <label for="luz">Exposición a la luz</label>
      <input type="text" id="luz" placeholder="Sol pleno" />
      
      <label for="espacio">Tamaño del espacio</label>
      <select id="espacio">
        <option value="mediano">Mediano (5-20m²)</option>
      </select>
      
      <label for="proposito">Propósito (opcional)</label>
      <input type="text" id="proposito" placeholder="Decorativas, Comestibles, Aromáticas..." />
    </form>
    <button type="button" class="btn" onclick="redirectToRegister()">Registrarme</button>
  </main>

  <script>
    // Manejo de navegación
    document.getElementById('btn-inicio').addEventListener('click', function() {
      window.location.href = '../Pantalla_Principal/index.html';
    });
    
    document.getElementById('btn-recomendaciones').addEventListener('click', function() {
      window.location.href = '../Pantalla_Principal/Contenidos/Sobre.html';
    });
    
    document.getElementById('btn-cuenta').addEventListener('click', function() {
      window.location.href = "{{ route('mi_perfil') }}";
    });
    
    function redirectToHome() {
      // Redirigir a la página de registro (ajusta la URL según sea necesario)
      window.location.href = '../Pantalla_Principal/Contenidos/Resultados.html';
    }
    
    function redirectToRegister() {
      // Redirigir a la página de inicio (ajusta la URL según sea necesario)
      window.location.href = '../Pantalla_Principal/Contenidos/Sobre.html';
    }
  </script>
</body>
</html>