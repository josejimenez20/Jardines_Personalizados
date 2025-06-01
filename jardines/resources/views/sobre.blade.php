<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FLORGAERFRA</title>
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

    <div id="progressText">0 de 5 preguntas completadas</div>

    <div class="question" data-question="clima">
      <p>¿Qué tipo de clima tiene?</p>
      <div class="options">
        <button class="option">Tropical cálido</button>
        <button class="option">Templado</button>
        <button class="option">Frío</button>
        <button class="option">Desértico</button>
      </div>
    </div>

    <div class="question" data-question="suelo">
      <p>¿Qué tipo de suelo tiene?</p>
      <div class="options">
        <button class="option">Arenoso</button>
        <button class="option">Arcilloso</button>
        <button class="option">Fértil</button>
        <button class="option">No sé</button>
      </div>
    </div>

    <div class="question" data-question="luz">
      <p>¿Cuánta luz solar recibe tu jardín?</p>
      <div class="options">
        <button class="option">Sol pleno</button>
        <button class="option">Semi-sombra</button>
        <button class="option">Sombra</button>
      </div>
    </div>

    <div class="question" data-question="riego">
      <p>¿Con qué frecuencia puedes regar?</p>
      <div class="options">
        <button class="option">Diariamente</button>
        <button class="option">Moderado</button>
        <button class="option">Poca frecuencia</button>
      </div>
    </div>

    <div class="question" data-question="plantas">
      <p>¿Qué tipo de plantas te interesan?</p>
      <div class="options">
        <button class="option">Ornamentales</button>
        <button class="option">Medicinales</button>
        <button class="option">Frutales</button>
        <button class="option">Suculentas</button>
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
