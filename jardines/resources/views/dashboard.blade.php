<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FLORGAERFRA</title>
  <link rel="shortcut icon" href="/JARDINES_PERSONALIZADOS/Img/logo_jardinespersonalizados.png" type="image/png">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <style>
    .btn-chat {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #7F5539;
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 50px;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      z-index: 1000;
    }

    .chat-box {
      display: none;
      position: fixed;
      bottom: 80px;
      right: 20px;
      width: 320px;
      background: #fff;
      border: 2px solid #ccc;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.2);
      font-family: Arial, sans-serif;
      z-index: 1001;
    }

    .chat-box h4 {
      margin-bottom: 12px;
    }

    .chat-msg {
      background: #e0e0e0;
      padding: 6px 10px;
      margin: 5px 0;
      border-radius: 6px;
      max-width: 80%;
      clear: both;
    }

    .chat-msg.user {
      background: #d1e7dd;
      margin-left: auto;
      text-align: right;
    }

    .chat-msg.other {
      background: #f0f0f0;
      margin-right: auto;
      text-align: left;
    }

    .chat-input {
      display: flex;
      gap: 6px;
      margin-top: 10px;
    }

    .chat-input input {
      flex-grow: 1;
      padding: 6px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .chat-input button {
      padding: 6px 12px;
      background-color: #7F5539;
      border: none;
      border-radius: 6px;
      color: white;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header class="header">
  </header>

  <main class="main-content">
    <img src="{{ asset('Img/logo_imagen.png') }}" alt="">
    <h1>¡Bienvenido/a {{ Auth::user()->name }} a FLORGAERFRA!</h1>
    <p class="subtitle">Tu asistente personal para crear el jardín perfecto</p>
    <p>Comienza obteniendo recomendaciones personalizadas de plantas</p>
    <button type="button" class="btn" onclick="redirectToStart()">Recomendación de especies</button>
  </main>

  <!-- Botón flotante -->
  <button class="btn-chat" onclick="toggleChat()">Chat</button>

  <!-- Chat -->
  <div class="chat-box" id="chatBox">
    <h4>Chat Global 🌎</h4>
    <div id="chat-contenido"></div>
    <div class="chat-input">
      <input type="text" id="mensajeUsuario" placeholder="Escribe un mensaje...">
      <button onclick="enviarMensaje()">Enviar</button>
    </div>
  </div>

  <!-- Socket.io -->
  <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
  <script>
    const socket = io('http://localhost:3000');
    const nombreUsuario = "{{ Auth::user()->name }}";

    socket.on('mensaje', data => {
      const divChat = document.getElementById('chat-contenido');
      const clase = data.usuario === nombreUsuario ? 'user' : 'other';
      divChat.innerHTML += `<div class="chat-msg ${clase}"><strong>${data.usuario}:</strong> ${data.mensaje}</div>`;
      divChat.scrollTop = divChat.scrollHeight;
    });

    socket.on('historial', data => {
      const chat = document.getElementById('chat-contenido');
      data.forEach(msg => {
      const clase = msg.usuario === nombreUsuario ? 'user' : 'other';
    chat.innerHTML += `<div class="chat-msg ${clase}"><strong>${msg.usuario}:</strong> ${msg.mensaje}</div>`;
  });
  chat.scrollTop = chat.scrollHeight;
});


    function enviarMensaje() {
      const input = document.getElementById('mensajeUsuario');
      const mensaje = input.value.trim();
      if (mensaje !== "") {
        socket.emit('mensaje', {
          usuario: nombreUsuario,
          mensaje: mensaje
        });
        input.value = "";
      }
    }

    function toggleChat() {
      const chat = document.getElementById('chatBox');
      chat.style.display = (chat.style.display === 'none' || chat.style.display === '') ? 'block' : 'none';
    }

    function redirectToStart() {
      window.location.href = "{{ route('pantalla_inicio') }}";
    }
  </script>
</body>
</html>
