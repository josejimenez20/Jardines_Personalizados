<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mi Perfil</title>
  <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <div class="perfil-wrapper">
    <div class="perfil-card">

      <!-- Ícono de regreso al inicio -->
      <a href="{{ route('pantalla_inicio') }}" class="back-home" title="Volver al inicio">
        <i class="bi bi-door-open-fill"></i>
      </a>

      <!-- Cabecera -->
      <header class="perfil-header">
        <h2>🌼 Hola, <span>{{ Auth::user()->name }}</span></h2>
        <p class="email">📧 {{ Auth::user()->email }}</p>
      </header>

      <!-- Mensajes -->
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>⚠️ Por favor corrige lo siguiente:</strong>
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
      @endif

      <!-- Cambio de contraseña -->
      <section class="perfil-section">
        <h3>Cambiar contraseña</h3>
        <form action="{{ route('perfil.updatePassword') }}" method="POST" class="formulario" id="form-password">
          @csrf
          <input type="password" name="current_password" placeholder="Contraseña actual" required>
          <input type="password" name="new_password" placeholder="Nueva contraseña" required minlength="8">
          <input type="password" name="confirm_password" placeholder="Confirmar nueva contraseña" required>
          <button type="submit" class="btn-primary">Actualizar contraseña</button>
        </form>
      </section>

      <hr>

      <!-- Cambio de correo -->
      <section class="perfil-section">
        <h3>Cambiar correo electrónico</h3>
        <form action="{{ route('perfil.updateEmail') }}" method="POST" class="formulario" id="form-email">
          @csrf
          <input type="email" name="email" placeholder="Nuevo correo" value="{{ old('email', Auth::user()->email) }}"
            required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Ingrese un correo electrónico válido">
          @error('email')
            <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
          @enderror
          <button type="submit" class="btn-primary">Actualizar correo</button>
        </form>
      </section>

      <hr>

      <!-- Eliminar cuenta -->
      <section class="perfil-section">
        <h3>Eliminar cuenta</h3>
        <form action="{{ route('perfil.deleteAccount') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.');">
          @csrf
          <button type="submit" class="btn-danger">Eliminar cuenta permanentemente</button>
        </form>
      </section>

      <!-- Cerrar sesión -->
      <form method="POST" action="{{ route('logout') }}" class="logout-form mt-3">
        @csrf
        <button type="submit" class="btn-secondary">Cerrar sesión</button>
      </form>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('form-password').addEventListener('submit', function(e) {
      const newPass = this.querySelector('input[name="new_password"]').value;
      const confirmPass = this.querySelector('input[name="confirm_password"]').value;
      if (newPass !== confirmPass) {
        e.preventDefault();
        alert("Las contraseñas no coinciden.");
      }
    });
  </script>
</body>
</html>
