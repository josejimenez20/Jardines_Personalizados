<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recomendaciones para tu Jardín</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #e8f5e9, #f1f8e9);
      font-family: 'Segoe UI', sans-serif;
    }
    .reco-card {
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      background-color: white;
      max-width: 800px;
      margin: auto;
    }
    .reco-header {
      text-align: center;
      margin-bottom: 2rem;
    }
    .tag {
      display: inline-block;
      padding: 0.4rem 1rem;
      background-color: #66bb6a;
      color: white;
      border-radius: 2rem;
      font-size: 0.9rem;
      margin: 0.3rem;
    }
    .btn-custom {
      background-color: #66bb6a;
      color: white;
      border: none;
      border-radius: 1rem;
      padding: 0.6rem 1.5rem;
      font-size: 1rem;
      transition: background-color 0.3s ease;
    }
    .btn-custom:hover {
      background-color: #43a047;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="reco-card">
      <div class="reco-header">
        <h1 class="text-success">🌿 Recomendaciones para tu Jardín</h1>
        <p class="text-muted">
          Basado en tu municipio: <strong>{{ $municipio->nombre }}</strong>
        </p>
      </div>

      <div class="mb-4">
        <h5 class="mb-3">🌱 Condiciones detectadas:</h5>
        <div>
          <span class="tag">🌤 Clima: {{ $municipio->clima }}</span>
          <span class="tag">🌍 Suelo: {{ $municipio->tipo_suelo }}</span>
          <span class="tag">💧 Agua: {{ $municipio->frecuencia_agua }}</span>
          <span class="tag">☀️ Luz: {{ $municipio->exposicion_luz }}</span>
          <span class="tag">🎯 Propósito: {{ $municipio->proposito }}</span>
        </div>
      </div>

      <hr>

      <div class="d-flex justify-content-center gap-3">
        <button type="button" class="btn btn-primary" onclick="redirectToRegister()">⚙️ Personalizar condiciones</button>
        <button type="button" class="btn btn-secondary" onclick="redirectToHome()">🌿 Ver especies sugeridas</button>
      </div>
    </div>
  </div>

  <script>
    function redirectToHome() {
      window.location.href = "{{ route('resultados') }}";
    }

    function redirectToRegister() {
      window.location.href = "{{ route('sobre') }}";
    }
  </script>
</body>
</html>
