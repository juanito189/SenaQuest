<?php
session_start();
include 'conexion.php';

$documento = $_SESSION['documento'] ?? null;

if (!$documento) {
    header("Location: inicioDeSeccion.php");
    exit();
}

$sql = "SELECT * FROM persona WHERE documento = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $documento);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d0d0d;
            color: #d0f0d0;
        }

        .card {
            background-color: #1a1a1a;
            border: 1px solid #5cb85c;
        }

        label {
            color: #b6fcb6;
        }

        .form-control {
            background-color: #2a2a2a;
            color: white;
            border: 1px solid #5cb85c;
        }

        .btn-success {
            background-color: #5cb85c;
            border: none;
        }

        .btn-success:hover {
            background-color: #4cae4c;
        }

        h2 {
            color: #a4e6a4;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Editar Perfil</h2>

    <div class="card p-4">
    <!-- Formulario para editar -->
    <form action="guardar-cambios.php" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" name="celular" class="form-control" maxlength="10" value="<?php echo htmlspecialchars($usuario['celular']); ?>" required>
        </div>
        <input type="hidden" name="documento" value="<?php echo $usuario['documento']; ?>">

        <div class="text-center">
            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </div>
    </form>

    <!-- Formulario separado para eliminar -->
    <form action="eliminar-perfil.php" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu perfil? Esta acción no se puede deshacer.');">
        <input type="hidden" name="documento" value="<?php echo $usuario['documento']; ?>">
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-danger">Eliminar Perfil</button>
        </div>
    </form>
</div>
