<?php
session_start();

// Conexión con la base de datos
$conexion = new mysqli("localhost", "root", "", "senaquest2");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Captura los datos del formulario
$documento = $_POST['username'];
$contrasena = $_POST['password'];

// Consulta para buscar el usuario
$sql = "SELECT * FROM persona WHERE documento = '$documento'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($contrasena, $usuario['contra'])) {
        // Guardar datos en la sesión
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];
        $_SESSION['documento'] = $usuario['documento'];
        $_SESSION['correo'] = $usuario['correo'];

        // Redirigir según el rol
        if ($usuario['rol'] === 'aprendiz') {
            header("Location: aprendiz.html");
        } elseif ($usuario['rol'] === 'instructor') {
            header("Location: instructor.html");
        } elseif ($usuario['rol'] === 'admin') {
            header("Location: admin.html");
        } else {
            echo "Rol desconocido.";
        }
    } else {
        // Contraseña incorrecta
        header("Location: inicioDeSeccion.php?error=Credenciales incorrectas.");
        exit();
    }
} else {
    // Documento no encontrado
    header("Location: inicioDeSeccion.php?error=Credenciales incorrectas.");
    exit();
}

$conexion->close();
?>
