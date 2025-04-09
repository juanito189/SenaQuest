<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $documento = $_POST['documento'];

    $sql = "DELETE FROM persona WHERE documento = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $documento);

    if ($stmt->execute()) {
        session_destroy();
        header("Location: inicioDeSeccion.php?mensaje=Perfil eliminado con éxito");
        exit();
    } else {
        echo "Error al eliminar el perfil.";
    }
}
?>
