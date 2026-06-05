<?php

session_start();
include("includes/conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM juegos WHERE id = $id";

$resultado = mysqli_query($conexion,$sql);

$juego = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $juego['nombre']; ?></title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <h1>🎮 GameStore</h1>
</header>

<div class="detalle-juego">

    <img
    src="img/<?php echo $juego['imagen']; ?>"
    alt=""
    >

    <h2>
        <?php echo $juego['nombre']; ?>
    </h2>

    <p>
        <?php echo $juego['descripcion']; ?>
    </p>

    <h3>
        Precio:
        $<?php echo $juego['precio']; ?>
    </h3>

    <a href="catalogo.php" class="boton">
        Volver al catálogo
    </a>

</div>

</body>
</html>