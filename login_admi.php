<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="css/login_admi.css">
</head>
<body>
<a href="index.html" id= "boton">Iniciar Sesión Usuario</a>
    <form action="validar_admi.php" method="post">
        <h1>Iniciar Sesión Administrador</h1>
        <p>Usuario 
            <input type="text" placeholder="Ingrese su usuario o correo" name="_usuario" >
        </p>
        <p>Contraseña 
            <input type="password" placeholder="Ingrese su contraseña" name="_contraseña">
        </p>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>