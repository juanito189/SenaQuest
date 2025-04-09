<?php
// Conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "senaquest2";

$conn = new mysqli($host, $usuario, $contrasena, $bd);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Captura de datos del formulario
$tipo_documento = $_POST['tipo_documento'];
$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$contra = $_POST['contra'];
$celular = $_POST['celular'];
$rol = $_POST['rol'];

// Validar si algún campo obligatorio está vacío
if (empty($tipo_documento) || empty($documento) || empty($nombre) || empty($apellido) || empty($correo) || empty($contra) || empty($celular) || empty($rol)) {
    echo "<script>alert('Por favor, complete todos los campos.'); window.history.back();</script>";
    exit;
}

// Encriptar contraseña
$contra_hash = password_hash($contra, PASSWORD_DEFAULT);

// Consulta preparada para insertar los datos
$sql = "INSERT INTO persona (tipo_documento, documento, nombre, apellido, correo, contra, celular, rol)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sissssss", $tipo_documento, $documento, $nombre, $apellido, $correo, $contra_hash, $celular, $rol);

if ($stmt->execute()) {
    echo "<script>alert('Cuenta creada exitosamente.'); window.location.href = 'inicioDeSeccion.php';</script>";
} else {
    echo "Error al crear la cuenta: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
