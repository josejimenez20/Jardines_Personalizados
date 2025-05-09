<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'db_jardines', 3307);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos del formulario
$correo = $_POST['correo'] ?? '';
$contrasena = $_POST['contraseña'] ?? '';

// Verificar que los campos no estén vacíos
if (empty($correo) || empty($contrasena)) {
    header("Location: login.html?error=campos");
    exit();
}

// Buscar el correo en la base de datos
$sql = "SELECT id, nombre, correo, contraseña FROM usuarios WHERE correo = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($contrasena, $usuario['contraseña'])) {
            // Inicio de sesión exitoso
            session_start();
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];

            // Redirigir a la página principal
            header("Location: /JARDINES_PERSONALIZADOS/Inicio/inicio.php");
            exit();
        } else {
            header("Location: login.html?error=contrasena");
            exit();
        }
    } else {
        header("Location: login.html?error=correo");
        exit();
    }

    $stmt->close();
} else {
    header("Location: login.html?error=consulta");
    exit();
}

// Cerrar conexión
$conn->close();
?>
