<?php
session_start();
include("../includes/conexion.php");

if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin'){
    header("Location: ../index.php");
    exit();
}

$sql = "SELECT * FROM juegos";
$resultado = mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel Admin</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<div class="admin-panel">

    <h1>Panel de Administración</h1>

    <a href="agregar.php" class="boton">
        Agregar Juego
    </a>

    <br><br>

    <table>

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>

        <?php while($juego = mysqli_fetch_assoc($resultado)): ?>

        <tr>

            <td><?= $juego['id']; ?></td>

            <td><?= $juego['nombre']; ?></td>

            <td>$<?= $juego['precio']; ?></td>

            <td>

                <a href="editar.php?id=<?= $juego['id']; ?>">
                    Editar
                </a>

                |

                <a href="eliminar.php?id=<?= $juego['id']; ?>"
                   onclick="return confirm('¿Eliminar juego?')">
                    Eliminar
                </a>

            </td>

        </tr>

        <?php endwhile; ?>

    </table>

</div>

</body>
</html>