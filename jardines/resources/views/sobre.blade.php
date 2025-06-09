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

<main class="main-content">
  <h1>Personaliza tu jardín</h1>
  <p class="info-text">Responde todas las preguntas para recibir recomendaciones personalizadas.</p>

  <div id="progressText">0 de 4 preguntas completadas</div>

  <!-- Frecuencia de riego -->
<div class="question" data-question="riego">
  <p>¿Con qué frecuencia riegas tu jardín?</p>
  <div class="options">
    <button class="option" value="riego alto">Mucho</button>
    <button class="option" value="riego moderado">Regular</button>
    <button class="option" value="riego bajo">Poco</button>
    <button class="option" value="riego nulo">Nunca</button>
  </div>
</div>

<!-- Tipo de suelo -->
<div class="question" data-question="suelo">
  <p>¿Qué tipo de suelo tiene?</p>
  <div class="options">
    <button class="option" value="suelo arenoso">Arenoso</button>
    <button class="option" value="suelo arcilloso">Arcilloso</button>
    <button class="option" value="suelo fértil">Fértil</button>
    <button class="option" value="suelo ácido">Ácido</button>
  </div>
</div>

<!-- Luz solar -->
<div class="question" data-question="luz">
  <p>¿Cuánta luz solar recibe tu jardín?</p>
  <div class="options">
    <button class="option" value="sombra">Sombra</button>
    <button class="option" value="sombra parcial">Semi sombra</button>
    <button class="option" value="sol pleno">Sol pleno</button>
  </div>
</div>

<!-- Tamaño -->
<div class="question" data-question="tamano">
  <p>¿Tamaño de espacio?</p>
  <div class="options">
    <button class="option" value="espacio pequeño">Pequeño 10m²</button>
    <button class="option" value="espacio mediano">Mediano 20-50m²</button>
    <button class="option" value="espacio grande">Grande 50-100m²</button>
  </div>
</div>

  <button id="continueBtn" class="submit-button" disabled onclick="redirectToRegister()">Continuar</button>

  <!-- Formulario oculto que se envía con las respuestas -->
  <form id="filtroForm" action="{{ route('resultados.filtro') }}" method="POST" style="display: none;">
  @csrf
  <input type="hidden" name="frecuencia_agua" id="frecuencia_agua">
  <input type="hidden" name="tipo_suelo" id="tipo_suelo">
  <input type="hidden" name="tamano_espacio" id="tamano_espacio">
  <input type="hidden" name="exposicion_luz" id="exposicion_luz">
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

  const questions = document.querySelectorAll('.question');
  const progressText = document.getElementById('progressText');
  const continueBtn = document.getElementById('continueBtn');

  questions.forEach(question => {
    const options = question.querySelectorAll('.option');
    options.forEach(option => {
      option.addEventListener('click', () => {
        options.forEach(o => o.classList.remove('selected'));
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

  function redirectToRegister() {
    document.getElementById('frecuencia_agua').value = document.querySelector('[data-question="riego"] .selected')?.value || '';
    document.getElementById('tipo_suelo').value = document.querySelector('[data-question="suelo"] .selected')?.value || '';
    document.getElementById('tamano_espacio').value = document.querySelector('[data-question="tamano"] .selected')?.value || '';
    document.getElementById('exposicion_luz').value = document.querySelector('[data-question="luz"] .selected')?.value || '';
    document.getElementById('filtroForm').submit();
  }
</script>
</body>
</html>
