<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recomendaciones de Plantas</title>
  <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
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

  <div class="container">
    <div class="filter-section">
      <div class="filter-criteria">
        <p>Basado en: Clima tropical cálido, suelo arenoso, sol pleno, riego moderado</p>
      </div>
      <div class="filter-count">{{ count($plantas) }} plantas encontradas</div>
      <div class="filter-buttons">
        <button class="filter-btn active" data-category="todas">Todas</button>
        <button class="filter-btn" data-category="ornamentales">Ornamentales</button>
        <button class="filter-btn" data-category="medicinales">Medicinales</button>
        <button class="filter-btn" data-category="frutales">Frutales</button>
        <button class="filter-btn" data-category="otras">Otras</button>
      </div>
    </div>

    <div class="plant-grid">
      @forelse($plantas as $planta)
        <div class="plant-card" data-category="{{ strtolower($planta->proposito) }}">
          <div class="plant-image">
            <img src="{{ asset('Img/' . $planta->imagen) }}" alt="{{ $planta->nombre }}" width="300" height="160">
          </div>
          <div class="plant-info">
            <div class="plant-name">{{ $planta->nombre }}</div>
            <div class="plant-scientific"><em>{{ $planta->nombre_cientifico }}</em></div>
            <div class="plant-tags">
              <span class="plant-tag">{{ ucfirst($planta->proposito) }}</span>
              <span class="plant-tag">{{ $planta->exposicion_luz }}</span>
              <span class="plant-tag">{{ $planta->tipo_suelo }}</span>
            </div>
          </div>
        </div>
      @empty
        <p class="text-muted">No se encontraron plantas para tu municipio.</p>
      @endforelse
    </div>
  </div>

  <script>
    document.getElementById('btn-inicio').addEventListener('click', function () {
      window.location.href = "{{ route('pantalla_inicio') }}";
    });

    document.getElementById('btn-recomendaciones').addEventListener('click', function () {
      window.location.href = "{{ route('recomen') }}";
    });

    document.getElementById('btn-cuenta').addEventListener('click', function () {
      window.location.href = "{{ route('mi_perfil') }}";
    });

    const filterButtons = document.querySelectorAll('.filter-btn');
    const plantCards = document.querySelectorAll('.plant-card');

    filterButtons.forEach(button => {
      button.addEventListener('click', () => {
        filterButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const category = button.getAttribute('data-category');

        plantCards.forEach(card => {
          if (category === 'todas' || card.getAttribute('data-category') === category) {
            card.classList.remove('hidden');
          } else {
            card.classList.add('hidden');
          }
        });

        const visiblePlants = document.querySelectorAll('.plant-card:not(.hidden)').length;
        document.querySelector('.filter-count').textContent = visiblePlants + ' plantas encontradas';
      });
    });
  </script>
</body>
</html>
