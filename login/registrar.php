<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'db_jardines', 3307);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$contrasena = $_POST['contraseña'] ?? '';
$municipio = $_POST['municipio'] ?? '';

// Verificar que los campos no estén vacíos
if (empty($nombre) || empty($correo) || empty($contrasena) || empty($municipio)) {
    die("Todos los campos son obligatorios.");
}

// Opcional: Encriptar la contraseña
$hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, correo, contraseña, municipio) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssss", $nombre, $correo, $hashedPassword, $municipio);
    if ($stmt->execute()) {
        echo "<script>
            window.location.href = '/JARDINES_PERSONALIZADOS/login/login.html';
        </script>";
    } else {
        echo "Error al registrar: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>