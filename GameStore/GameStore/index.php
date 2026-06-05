<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <header>

        <h1>🎮 GameStore</h1>

        <nav>

            <a href="index.php">Inicio</a>
            <a href="catalogo.php">Catálogo</a>

            <?php if (isset($_SESSION['id'])): ?>

                <span class="usuario">
                    Bienvenido, <?= $_SESSION['nombre']; ?>
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

    <section class="hero">

        <h2>Los mejores videojuegos al mejor precio</h2>

        <p>
            Descubre títulos para PC, PlayStation, Xbox y Nintendo.
            Encuentra las mejores ofertas y amplía tu colección.
        </p>

        <a href="catalogo.php" class="boton">
            Ver Catálogo
        </a>

    </section>

    <section class="destacados">

        <h2>Juegos Destacados</h2>

        <div class="contenedor-juegos">

            <div class="juego">
                <img src="img/cs2.jpg" alt="Counter Strike 2">
                <h3>Counter Strike 2</h3>
                <p>Acción táctica multijugador.</p>
            </div>

            <div class="juego">
                <img src="img/gta6.png.avif" alt="GTA VI">
                <h3>GTA VI</h3>
                <p>Aventura en mundo abierto.</p>
            </div>

            <div class="juego">
                <img src="img/minecraft.jpeg" alt="Minecraft">
                <h3>Minecraft</h3>
                <p>Construye y explora sin límites.</p>
            </div>

        </div>

    </section>

    <footer>
        <p>© 2026 GameStore - Todos los derechos reservados.</p>
    </footer>

</body>

</html>