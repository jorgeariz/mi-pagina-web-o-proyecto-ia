<?php
session_start();
include("includes/conexion.php");

$sql = "SELECT * FROM juegos";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Catálogo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <header>

        <h1>🎮 GameStore</h1>

        <nav>
            <a href="index.php">Inicio</a>

            <?php if (isset($_SESSION['id'])): ?>
                <span class="usuario">
                    <?= $_SESSION['nombre']; ?>
                </span>
                <a href="logout.php">Cerrar sesión</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="registro.php">Registro</a>
            <?php endif; ?>

            <?php if ($_SESSION['rol'] == 'admin'): ?>

                <a href="admin/panel.php">
                    Administración
                </a>

            <?php endif; ?>

        </nav>

    </header>

    <section class="catalogo">

        <h2>Nuestro Catálogo</h2>

        <div class="contenedor-juegos">

            <?php while ($juego = mysqli_fetch_assoc($resultado)): ?>

                <div class="juego">

                    <img src="img/<?php echo $juego['imagen']; ?>">

                    <h3>
                        <?php echo $juego['nombre']; ?>
                    </h3>

                    <p>
                        $<?php echo $juego['precio']; ?>
                    </p>

                    <a
                        href="detalle.php?id=<?php echo $juego['id']; ?>"
                        class="boton">
                        Ver Detalles
                    </a>

                </div>

            <?php endwhile; ?>

        </div>

    </section>

</body>

</html>