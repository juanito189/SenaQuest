<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];

    $stmt = $conexion->prepare("UPDATE persona SET nombre = ?, correo = ?, celular = ? WHERE documento = ?");
    $stmt->bind_param("ssss", $nombre, $correo, $celular, $documento);

    if ($stmt->execute()) {
        // Actualiza la sesión si se cambió el nombre o correo
        $_SESSION['nombre'] = $nombre;
        $_SESSION['correo'] = $correo;
        $_SESSION['celular'] = $celular;
        header("Location: perfil.php?mensaje=Cambios guardados");
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }
}
?>

