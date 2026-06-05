<?php

session_start();
include("../includes/conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM juegos WHERE id=$id";
$resultado = mysqli_query($conexion,$sql);

$juego = mysqli_fetch_assoc($resultado);

if(isset($_POST['actualizar'])){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $update = "UPDATE juegos SET
                nombre='$nombre',
                descripcion='$descripcion',
                precio='$precio',
                imagen='$imagen'
                WHERE id=$id";

    mysqli_query($conexion,$update);

    header("Location: panel.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Editar</title>
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<div class="formulario">

<h2>Editar Juego</h2>

<form method="POST">

<input type="text"
name="nombre"
value="<?= $juego['nombre']; ?>">

<textarea name="descripcion"><?= $juego['descripcion']; ?></textarea>

<input type="number"
step="0.01"
name="precio"
value="<?= $juego['precio']; ?>">

<input type="text"
name="imagen"
value="<?= $juego['imagen']; ?>">

<button name="actualizar">
Actualizar
</button>

</form>

</div>

</body>
</html>