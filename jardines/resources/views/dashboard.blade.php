<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio</title>
  <link rel="shortcut icon" href="{{ asset('Img/logo_imagen.png') }}" type="image/png" />
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <style>
.btn-chat {
  position: fixed;
  bottom: 24px;
  right: 24px;
  background-color: #7F5539;
  color: #fff;
  border: none;
  padding: 12px 20px;
  border-radius: 999px;
  cursor: pointer;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
  font-weight: bold;
  transition: all 0.3s ease;
  z-index: 1000;
}

.btn-chat:hover {
  background-color: #5e3e29;
  transform: scale(1.05);
}

.chat-box {
  display: none;
  position: fixed;
  bottom: 90px;
  right: 24px;
  width: 340px;
  background: #fff8f0;
  border: 2px solid #c7a27c;
  border-radius: 16px;
  padding: 16px;
  box-shadow: 0 10px 24px rgba(0, 0, 0, 0.3);
  font-family: 'Segoe UI', sans-serif;
  z-index: 1001;
  animation: slideUp 0.3s ease;
}

@keyframes slideUp {
  from { transform: translateY(30px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}

.chat-box h4 {
  margin-bottom: 14px;
  font-size: 18px;
  color: #5e3e29;
  border-bottom: 1px solid #d4c0a5;
  padding-bottom: 8px;
}

.chat-msg {
  background: #f3e9dd;
  padding: 8px 12px;
  margin: 6px 0;
  border-radius: 12px;
  max-width: 80%;
  clear: both;
  font-size: 14px;
}

.chat-msg.user {
  background: #d8f3dc;
  margin-left: auto;
  text-align: right;
  color: #2d6a4f;
}

.chat-msg.other {
  background: #ffe8cc;
  margin-right: auto;
  text-align: left;
  color: #7f5539;
}

.chat-input {
  display: flex;
  gap: 8px;
  margin-top: 12px;
}

.chat-input input {
  flex: 1;
  padding: 8px;
  border-radius: 8px;
  border: 1px solid #c0b9b0;
  font-size: 14px;
}

.chat-input button {
  padding: 8px 14px;
  background-color: #7F5539;
  border: none;
  border-radius: 8px;
  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

.chat-input button:hover {
  background-color: #5e3e29;
}
  </style>
</head>
<body>
  <header class="header"></header>

  <main class="main-content">
    <img src="{{ asset('Img/logo_imagen.png') }}" alt="">
    <h1>¡Bienvenido {{ Auth::user()->name }} a FLORGAERFRA!</h1>
    <p class="subtitle">Tu asistente personal para crear el jardín perfecto</p>
    <p>Comienza obteniendo recomendaciones personalizadas de plantas</p>
    <button type="button" class="btn" onclick="redirectToStart()">Recomendación de especies</button>
  </main>

  <button class="btn-chat" onclick="toggleChat()">Chat</button>

  <div class="chat-box" id="chatBox">
    <h4>Chat Global</h4>
    <div id="chat-contenido"></div>
    <div class="chat-input">
      <input type="text" id="mensajeUsuario" placeholder="Escribe un mensaje...">
      <button onclick="enviarMensaje()">Enviar</button>
    </div>
  </div>

  <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
  <script>
  const socket = io('http://localhost:3000');
  const nombreUsuario = "{{ Auth::user()->name }}";

  // Permiso de notificaciones
  if (Notification.permission !== "granted") {
    Notification.requestPermission();
  }

  // IndexedDB
  let db;
  const request = indexedDB.open("ChatJardinesDB", 1);

  request.onupgradeneeded = function(event) {
    db = event.target.result;
    if (!db.objectStoreNames.contains("mensajes")) {
      db.createObjectStore("mensajes", { keyPath: "fecha" });
    }
  };

  request.onsuccess = function(event) {
    db = event.target.result;
  };

  function guardarMensajeIndexedDB(mensaje) {
    if (!db) return;
    const tx = db.transaction(["mensajes"], "readwrite");
    tx.objectStore("mensajes").add({ ...mensaje, fecha: new Date().toISOString() });
  }

  function mostrarMensajesOffline() {
    const tx = db.transaction(["mensajes"], "readonly");
    const store = tx.objectStore("mensajes");
    const request = store.getAll();
    request.onsuccess = function(event) {
      const mensajes = event.target.result;
      const chat = document.getElementById("chat-contenido");
      chat.innerHTML = "";
      mensajes.forEach(msg => {
        const clase = msg.usuario === nombreUsuario ? 'user' : 'other';
        chat.innerHTML += `<div class="chat-msg ${clase}"><strong>${msg.usuario}:</strong> ${msg.mensaje}</div>`;
      });
    };
  }

  socket.on("connect_error", () => {
    console.warn("Servidor no disponible. Modo offline.");
    mostrarMensajesOffline();
  });

  socket.on('mensaje', data => {
    const divChat = document.getElementById('chat-contenido');
    const clase = data.usuario === nombreUsuario ? 'user' : 'other';
    divChat.innerHTML += `<div class="chat-msg ${clase}"><strong>${data.usuario}:</strong> ${data.mensaje}</div>`;
    divChat.scrollTop = divChat.scrollHeight;

    if (data.usuario !== nombreUsuario && Notification.permission === 'granted') {
      new Notification(`Nuevo mensaje de ${data.usuario}`, {
        body: data.mensaje,
        icon: "{{ asset('img/notificacion.png') }}"
      });
    }

    guardarMensajeIndexedDB(data);
  });

  socket.on('historial', data => {
    const chat = document.getElementById('chat-contenido');
    chat.innerHTML = '';
    data.forEach(msg => {
      const clase = msg.usuario === nombreUsuario ? 'user' : 'other';
      chat.innerHTML += `<div class="chat-msg ${clase}"><strong>${msg.usuario}:</strong> ${msg.mensaje}</div>`;
      guardarMensajeIndexedDB(msg);
    });
    chat.scrollTop = chat.scrollHeight;
  });

  function enviarMensaje() {
    const input = document.getElementById('mensajeUsuario');
    const mensaje = input.value.trim();
    if (mensaje !== "") {
      const msg = { usuario: nombreUsuario, mensaje: mensaje };
      socket.emit('mensaje', msg);
      guardarMensajeIndexedDB(msg);
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
