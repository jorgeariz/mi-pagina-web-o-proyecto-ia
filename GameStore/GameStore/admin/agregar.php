<?php
session_start();
include("../includes/conexion.php");

if(isset($_POST['guardar'])){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $sql = "INSERT INTO juegos
            (nombre,descripcion,precio,imagen)
            VALUES
            ('$nombre','$descripcion','$precio','$imagen')";

    mysqli_query($conexion,$sql);

    header("Location: panel.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Juego</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<div class="formulario">

<h2>Agregar Juego</h2>

<form method="POST">

<input type="text"
       name="nombre"
       placeholder="Nombre">

<textarea
name="descripcion"
placeholder="Descripción">
</textarea>

<input type="number"
step="0.01"
name="precio"
placeholder="Precio">

<input type="text"
name="imagen"
placeholder="Imagen.jpg">

<button type="submit"
name="guardar">
Guardar
</button>

</form>

</div>

</body>
</html>