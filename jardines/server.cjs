const express = require('express');
const cors = require('cors');
const http = require('http');
const { Server } = require('socket.io');
const mongoose = require('mongoose');
const mysql = require('mysql2/promise'); // conexión a MySQL

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
  cors: { origin: "*", methods: ["GET", "POST"] }
});

app.use(cors());
app.use(express.json());

// 🔌 Conectar a MongoDB
mongoose.connect('mongodb://127.0.0.1:27017/chatjardines')
  .then(() => console.log('✅ Conectado a MongoDB'))
  .catch(err => console.error('❌ Error conectando a MongoDB:', err));

// 🧾 Esquema para guardar mensajes de chat
const Mensaje = mongoose.model('Mensaje', new mongoose.Schema({
  usuario: String,
  mensaje: String,
  fecha: { type: Date, default: Date.now }
}));

// 📦 Conexión a MySQL
const pool = mysql.createPool({
  host: 'localhost',
  user: 'root',
  password: '', // agrega si tienes contraseña
  database: 'jardines',
  waitForConnections: true,
  connectionLimit: 10
});

// 🏠 Ruta principal
app.get('/', (req, res) => {
  res.send('<h2>Servidor con Chat + MongoDB + Análisis desde MySQL</h2>');
});

// 🔔 Ruta de prueba Laravel
app.post('/notificar', (req, res) => {
  console.log('🔔 Evento Laravel:', req.body);
  res.status(200).json({ mensaje: 'Notificación OK' });
});

// 📊 Ruta para análisis de compatibilidad
app.post('/analisis', async (req, res) => {
  try {
    const { user_id } = req.body;
    if (!user_id) return res.status(400).json({ error: 'Falta user_id' });

    // Obtener condiciones del usuario desde MySQL
    const [usuarios] = await pool.query(
      'SELECT tipo_suelo, frecuencia_agua, exposicion_luz FROM users WHERE id = ?',
      [user_id]
    );
    if (usuarios.length === 0) return res.status(404).json({ error: 'Usuario no encontrado' });

    const { tipo_suelo, frecuencia_agua, exposicion_luz } = usuarios[0];

    // Obtener una planta del mismo municipio (como referencia)
    const [plantas] = await pool.query(
      'SELECT tamano_espacio FROM plantas WHERE municipio_id = (SELECT municipio_id FROM users WHERE id = ?) LIMIT 1',
      [user_id]
    );
    const tamano_espacio = plantas[0]?.tamano_espacio || '';

    // Comparación con valores ideales (puedes modificar)
    const ideales = {
      suelo: tipo_suelo,
      agua: frecuencia_agua,
      luz: exposicion_luz,
      espacio: tamano_espacio
    };

    let total = 0;
    if (tipo_suelo === ideales.suelo) total++;
    if (frecuencia_agua === ideales.agua) total++;
    if (exposicion_luz === ideales.luz) total++;
    if (tamano_espacio === ideales.espacio) total++;

    const porcentaje = (total / 4) * 100;

    console.log(`📊 Análisis real: ${porcentaje}% para usuario ${user_id}`);
    res.json({ porcentaje });

  } catch (error) {
    console.error('❌ Error en /analisis:', error);
    res.status(500).json({ error: 'Error interno' });
  }
});

// 💬 Chat con socket.io y MongoDB
io.on('connection', async (socket) => {
  console.log('🟢 Usuario conectado');

  const mensajes = await Mensaje.find().sort({ fecha: 1 }).limit(50);
  socket.emit('historial', mensajes);

  socket.on('mensaje', async (data) => {
    const nuevo = new Mensaje(data);
    await nuevo.save();
    io.emit('mensaje', data);
  });

  socket.on('disconnect', () => {
    console.log('🔴 Usuario desconectado');
  });
});

// 🚀 Lanzar servidor
server.listen(3000, () => {
  console.log('✅ Servidor corriendo en http://localhost:3000');
});
