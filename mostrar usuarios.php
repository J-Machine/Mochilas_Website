<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuarios</title>
    <link rel="stylesheet" href="css/mostrar_usuarios.css">
</head>
<body>
    <header>
        <div class="conteiner">
            <a href="home_admin.html">Regresar</a>
            <h1>Administración - Usuarios</h1>
        </div>
    </header>
    <section>
        <center>
        <table>
            <thead>
                <tr>
                    <th>Id_DNI</th>
                    <th>Nombres</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Teléfono</th>
                    <th>Administrador</th>
                </tr>
            </thead>
                <tbody>
                    <?php
                    include("bd.php");

                    $query = "SELECT * FROM usuario";
                    $resultado = $conexion->query($query);
                    while ($row =$resultado->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id_dni'];?></td>
                        <td><?php echo $row['nombres'];?></td>
                        <td><?php echo $row['primer_apellido'];?></td>
                        <td><?php echo $row['segundo_apellido'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['usuario'];?></td>
                        <td><?php echo $row['contraseña'];?></td>
                        <td><?php echo $row['telefono'];?></td>
                        <td><?php echo $row['administrador'];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
        </table>
        </center>
    </section>
</body>
</html>
