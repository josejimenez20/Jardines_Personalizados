const express = require('express');
const cors = require('cors');
const http = require('http');
const { Server } = require('socket.io');
const mongoose = require('mongoose');
const mysql = require('mysql2/promise'); 

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
  cors: { origin: "*", methods: ["GET", "POST"] }
});

app.use(cors());
app.use(express.json());

// Conexión a MongoDB
mongoose.connect('mongodb://127.0.0.1:27017/chatjardines')
  .then(() => console.log('Conectado a MongoDB'))
  .catch(err => console.error('Error conectando a MongoDB:', err));

// Modelo de mensajes para el chat
const Mensaje = mongoose.model('Mensaje', new mongoose.Schema({
  usuario: String,
  mensaje: String,
  fecha: { type: Date, default: Date.now }
}));

// Conexión a MySQL
const pool = mysql.createPool({
  host: 'localhost',
  user: 'root',
  password: '', 
  database: 'db_jardines',
  waitForConnections: true,
  connectionLimit: 10
});

// Ruta principal
app.get('/', (req, res) => {
  res.send('<h2>Servidor con Chat + MongoDB + Análisis desde MySQL</h2>');
});

// Ruta para notificaciones desde Laravel
app.post('/notificar', (req, res) => {
  console.log('Evento recibido desde Laravel:', req.body);
  res.status(200).json({ mensaje: 'Notificación OK' });
});

// Ruta para análisis de compatibilidad con plantas
app.post('/analisis', async (req, res) => {
  try {
    const { user_id } = req.body;
    if (!user_id) return res.status(400).json({ error: 'Falta user_id' });

    // Obtener condiciones del usuario
    const [usuarios] = await pool.query(
      'SELECT tipo_suelo, frecuencia_agua, exposicion_luz FROM users WHERE id = ?',
      [user_id]
    );
    if (usuarios.length === 0) return res.status(404).json({ error: 'Usuario no encontrado' });

    const usuario = usuarios[0];

    // Obtener plantas del mismo municipio
    const [plantas] = await pool.query(
      `SELECT tipo_suelo, frecuencia_agua, exposicion_luz, tamano_espacio
       FROM plantas
       WHERE municipio_id = (SELECT municipio_id FROM users WHERE id = ?)`,
      [user_id]
    );

    if (plantas.length === 0) return res.json({ porcentaje: 0 });

    // Comparar filtros del usuario con cada planta
    let totalCoincidencias = 0;
    plantas.forEach(planta => {
      let coincidencias = 0;
      if (planta.tipo_suelo === usuario.tipo_suelo) coincidencias++;
      if (planta.frecuencia_agua === usuario.frecuencia_agua) coincidencias++;
      if (planta.exposicion_luz === usuario.exposicion_luz) coincidencias++;
      if (planta.tamano_espacio) coincidencias++; // si existe, suma
      totalCoincidencias += coincidencias;
    });

    const totalComparaciones = plantas.length * 4;
    const porcentaje = Math.round((totalCoincidencias / totalComparaciones) * 100);

    console.log(`Compatibilidad calculada: ${porcentaje}% para user ${user_id}`);
    res.json({ porcentaje });

  } catch (error) {
    console.error('Error en análisis:', error);
    res.status(500).json({ error: 'Error interno' });
  }
});

// Socket.io: chat en tiempo real con MongoDB
io.on('connection', async (socket) => {
  console.log('Usuario conectado');

  // Enviar historial
  const mensajes = await Mensaje.find().sort({ fecha: 1 }).limit(50);
  socket.emit('historial', mensajes);

  // Recibir y emitir mensajes
  socket.on('mensaje', async (data) => {
    const nuevo = new Mensaje(data);
    await nuevo.save();
    io.emit('mensaje', data);
  });

  socket.on('disconnect', () => {
    console.log('Usuario desconectado');
  });
});

// Lanzar servidor
server.listen(3000, () => {
  console.log('Servidor corriendo en http://localhost:3000');
});
