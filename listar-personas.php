<?php
include 'conexion.php';

$sql = "SELECT * FROM persona";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Personas</title>
</head>
<body>
    <h1>Personas Registradas</h1>
    <table border="1">
        <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= $fila['documento'] ?></td>
                <td><?= $fila['nombre'] ?></td>
                <td><?= $fila['apellido'] ?></td>
                <td><?= $fila['correo'] ?></td>
                <td><?= $fila['celular'] ?></td>
                <td><?= $fila['rol'] ?></td>
                <td>
                    <a href="editar-persona.php?documento=<?= $fila['documento'] ?>">Editar</a> | 
                    <a href="eliminar-persona.php?documento=<?= $fila['documento'] ?>" onclick="return confirm('¿Estás seguro de eliminar esta persona?');">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
