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
    <h1>🌿 Personaliza tu jardín</h1>
    <p class="info-text">Responde todas las preguntas para recibir recomendaciones personalizadas.</p>

    <div id="progressText">0 de 3 preguntas completadas</div>

    <div class="question" data-question="clima">
      <p>¿Con que frecuencia riegas tu jardín?</p>
      <div class="options">
        <button class="option">Mucho</button>
        <button class="option">Regular</button>
        <button class="option">Poco</button>
        <button class="option">Nunca</button>
      </div>
    </div>

    <div class="question" data-question="suelo">
      <p>¿Qué tipo de suelo tiene?</p>
      <div class="options">
        <button class="option">Arenoso</button>
        <button class="option">Arcilloso</button>
        <button class="option">Fértil</button>
        <button class="option">Ácido</button>
      </div>
    </div>


    <div class="question" data-question="riego">
      <p>¿Tamaño de espacio?</p>
      <div class="options">
        <button class="option">Pequeño 10m²</button>
        <button class="option">Mediano 20m² - 50m²</button>
        <button class="option">Grande 50m² - 100m²</button>
      </div>
    </div>

    <button id="continueBtn" class="submit-button" disabled onclick="redirectToRegister()">Continuar</button>
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

  function redirectToRegister() {
    window.location.href = "{{ route('resultados') }}";
  }

  const questions = document.querySelectorAll('.question');
  const progressText = document.getElementById('progressText');
  const continueBtn = document.getElementById('continueBtn');

  questions.forEach(question => {
    const options = question.querySelectorAll('.option');

    options.forEach(option => {
      option.addEventListener('click', () => {
        // Quitar selección solo en el grupo actual
        options.forEach(o => o.classList.remove('selected'));
        // Marcar solo el clickeado
        option.classList.add('selected');
        checkCompletion();
      });
    });
  });

  function checkCompletion() {
    let completed = 0;
    questions.forEach(q => {
      if (q.querySelector('.option.selected')) {
        completed++;
      }
    });
    progressText.textContent = `${completed} de ${questions.length} preguntas completadas`;
    continueBtn.disabled = completed !== questions.length;
  }
</script>
</body>
</html>
