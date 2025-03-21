<?php
include 'config.php';

$sql = "SELECT * FROM personas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Personas</title>
</head>
<body>
    <h2>Lista de Personas</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Mayor de Edad</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['edad']; ?></td>
                <td><?php echo ($row['edad'] >= 18) ? 'Sí' : 'No'; ?></td>
                <td>
                    <form action="editar.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Editar</button>
                    </form>
                    <form action="eliminar.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Agregar Nueva Persona</h2>
    <form action="agregar.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Correo" required>
        <input type="number" name="edad" placeholder="Edad" required>
        <button type="submit">Agregar</button>
    </form>
</body>
</html>