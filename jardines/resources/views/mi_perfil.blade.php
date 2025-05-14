<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Perfil | FLORGAERFRA</title>
  <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
</head>
<body>
  <div class="perfil-wrapper">
    <div class="perfil-card">
      <h2>🌼 Bienvenido/a, {{ Auth::user()->name }}</h2>
      <p class="email">📧 {{ Auth::user()->email }}</p>

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

      <hr>
      <form action="{{ route('perfil.updatePassword') }}" method="POST" class="formulario">
        @csrf
        <h3>🔐 Cambiar contraseña</h3>
        <input type="password" name="current_password" placeholder="Contraseña actual" required>
        <input type="password" name="new_password" placeholder="Nueva contraseña" required>
        <input type="password" name="confirm_password" placeholder="Confirmar nueva contraseña" required>
        <button type="submit">Actualizar contraseña</button>
      </form>

      <hr>
      <form action="{{ route('perfil.updateEmail') }}" method="POST" class="formulario">
        @csrf
        <h3>✉️ Cambiar correo electrónico</h3>
        <input type="email" name="email" placeholder="Nuevo correo" value="{{ Auth::user()->email }}" required>
        <button type="submit">Actualizar correo</button>
      </form>

      <hr>
      <form action="{{ route('perfil.deleteAccount') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.');">
        @csrf
        <button type="submit" class="btn-danger">🗑️ Eliminar cuenta</button>
      </form>

      <form method="POST" action="{{ route('logout') }}" style="margin-top: 20px;">
        @csrf
        <button type="submit">🚪 Cerrar sesión</button>
      </form>
    </div>
  </div>
</body>
</html>
