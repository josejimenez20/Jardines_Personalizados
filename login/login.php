<?php
session_start(); // Muy importante para usar variables de sesión

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
    $_SESSION['error_login'] = "Por favor, complete todos los campos.";
    header("Location: /JARDINES_PERSONALIZADOS/login/login.html");
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
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];

            // Redirigir a la pantalla principal
            header("Location: /JARDINES_PERSONALIZADOS/Inicio/inicio.html");
            exit();
        } else {
            // Contraseña incorrecta
            $_SESSION['error_login'] = "Contraseña incorrecta.";
            header("Location: /JARDINES_PERSONALIZADOS/login/login.html");
            exit();
        }
    } else {
        // Correo no registrado
        $_SESSION['error_login'] = "El correo no está registrado.";
        header("Location: /JARDINES_PERSONALIZADOS/login/login.html");
        exit();
    }

    $stmt->close();
} else {
    $_SESSION['error_login'] = "Error en el servidor. Inténtalo más tarde.";
    header("Location: /JARDINES_PERSONALIZADOS/login/login.html");
    exit();
}

// Cerrar conexión
$conn->close();
?>


/*
    Ha este Php le falta la validación de notificciones ese codigo con el creador de este archivo
    y la validación de que el usuario no haya iniciado sesión antes de iniciar sesión
*/