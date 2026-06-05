<?php

session_start();
include("includes/conexion.php");

if(isset($_POST['login'])){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios
            WHERE correo='$correo'";

    $resultado = mysqli_query($conexion,$sql);

    if(mysqli_num_rows($resultado) > 0){

        $usuario = mysqli_fetch_assoc($resultado);

        if(password_verify(
            $password,
            $usuario['password']
        )){

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            header("Location: index.php");
            exit();

        }else{
            echo "<script>alert('Contraseña incorrecta');</script>";
        }

    }else{
        echo "<script>alert('Usuario no encontrado');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="formulario">

    <h2>Iniciar Sesión</h2>

    <form method="POST">

        <input type="email"
               name="correo"
               placeholder="Correo"
               required>

        <input type="password"
               name="password"
               placeholder="Contraseña"
               required>

        <button type="submit" name="login">
            Ingresar
        </button>

    </form>

</div>

</body>
</html>