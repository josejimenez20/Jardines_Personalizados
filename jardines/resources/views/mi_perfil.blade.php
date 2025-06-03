<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mi Perfil | FLORGAERFRA</title>
  <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
</head>
<body>
  <div class="perfil-wrapper">
    <div class="perfil-card">
      
      <!-- Bienvenida -->
      <header class="perfil-header">
        <h2>🌼 Bienvenido/a, <span>{{ Auth::user()->name }}</span></h2>
        <p class="email">📧 {{ Auth::user()->email }}</p>
      </header>

      <!-- Mensajes del sistema -->
      @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
      @endif

      @if($errors->any())
        <div class="alert error">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Cambio de contraseña -->
      <section class="perfil-section">
        <h3>🔐 Cambiar contraseña</h3>
        <form action="{{ route('perfil.updatePassword') }}" method="POST" class="formulario">
          @csrf
          <input type="password" name="current_password" placeholder="Contraseña actual" required>
          <input type="password" name="new_password" placeholder="Nueva contraseña" required>
          <input type="password" name="confirm_password" placeholder="Confirmar nueva contraseña" required>
          <button type="submit" class="btn-primary">Actualizar contraseña</button>
        </form>
      </section>

      <hr>

      <!-- Cambio de correo -->
      <section class="perfil-section">
        <h3>📫 Cambiar correo electrónico</h3>
        <form action="{{ route('perfil.updateEmail') }}" method="POST" class="formulario">
          @csrf
          <input type="email" name="email" placeholder="Nuevo correo" value="{{ Auth::user()->email }}" required>
          <button type="submit" class="btn-primary">Actualizar correo</button>
        </form>
      </section>

      <hr>

      <section class="perfil-section">
        <h3>❌ Eliminar cuenta</h3>
        <form action="{{ route('perfil.deleteAccount') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.');">
          @csrf
          <button type="submit" class="btn-danger">Eliminar cuenta permanentemente</button>
        </form>
      </section>

      <!-- Cerrar sesión -->
      <form method="POST" action="{{ route('logout') }}" class="logout-form">
        @csrf
        <button type="submit" class="btn-secondary">Cerrar sesión</button>
      </form>

    </div>
  </div>
</body>
</html>
