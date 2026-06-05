<?php

session_start();
include("../includes/conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM juegos
        WHERE id = $id";

mysqli_query($conexion,$sql);

header("Location: panel.php");