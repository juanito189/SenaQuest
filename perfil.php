<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['mensaje'])) {
    echo '<div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin: 10px auto; width: 80%; text-align: center; border-radius: 5px;">' 
        . htmlspecialchars($_GET['mensaje']) . 
        '</div>';
}

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
<?php
include 'conexion.php';

if (!isset($_SESSION['documento'])) {
    header("Location: inicioDeSeccion.php");
    exit();
}

$documento = $_SESSION['documento'];

// Lógica para eliminar la cuenta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $sql = "DELETE FROM persona WHERE documento = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $documento);

    if ($stmt->execute()) {
        session_unset();
        session_destroy();
        header("Location: inicioDeSeccion.php?mensaje=Cuenta eliminada exitosamente");
        exit();
    } else {
        $error = "Hubo un error al eliminar la cuenta.";
    }
}

// Obtener los datos del usuario
$sql = "SELECT * FROM persona WHERE documento = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $documento);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d0d0d;
            color:rgb(175, 217, 175);
        }

        .card {
            background-color: #1a1a1a;
            border: 1px solid #5cb85c;
        }
        .card-title {
    font-size: 1.8rem;
    font-weight: bold;
    color: #aefcae; /* Más brillante */
    text-align: center;
    margin-bottom: 1rem;
}


        .btn-editar {
            background-color: #5cb85c;
            border: none;
            color: black;
        }

        .btn-eliminar {
            background-color: #d9534f;
            border: none;
            color: white;
        }

        .btn-editar:hover {
            background-color: #4cae4c;
        }

        .btn-eliminar:hover {
            background-color: #c9302c;
        }

        strong {
            color:rgb(255, 255, 255);
        }

        h2 {
            color:rgb(255, 255, 255);
        }

        p{
            color:rgb(185, 185, 185);
        }
        h5 {
            color: rgb(31, 101, 57);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Mi Perfil</h2>

    <div class="card p-4">
        <div class="card-body">
            <h5 class="card-title">Datos del Usuario</h5>
            <hr>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
            <p><strong>Documento:</strong> <?php echo htmlspecialchars($usuario['documento']); ?></p>
            <p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>
            <p><strong>Celular:</strong> <?php echo htmlspecialchars($usuario['celular']); ?></p>
            <p><strong>Rol:</strong> <?php echo htmlspecialchars($usuario['rol']); ?></p>

            <div class="mt-4 d-flex gap-3">
                <a href="editar-perfil.php" class="btn btn-editar">Editar</a>


                
                <form method="POST" onsubmit="return confirm('¿Estás seguro de eliminar tu cuenta?')">
    <input type="hidden" name="eliminar" value="1">
    <button type="submit" class="btn btn-eliminar">Eliminar cuenta</button>
</form>

            </div>
        </div>
    </div>
</div>

</body>
</html>
