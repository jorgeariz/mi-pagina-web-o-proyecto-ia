<?php
include("includes/conexion.php");

if(isset($_POST['registrar'])){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios(nombre, correo, password)
            VALUES('$nombre','$correo','$password')";

    if(mysqli_query($conexion,$sql)){
        echo "<script>
                alert('Usuario registrado correctamente');
              </script>";
    }else{
        echo "Error: ".mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="formulario">

    <h2>Registro de Usuario</h2>

    <form method="POST">

        <input type="text"
               name="nombre"
               placeholder="Nombre"
               required>

        <input type="email"
               name="correo"
               placeholder="Correo"
               required>

        <input type="password"
               name="password"
               placeholder="Contraseña"
               required>

        <button type="submit" name="registrar">
            Registrarse
        </button>

    </form>

</div>

</body>
</html>