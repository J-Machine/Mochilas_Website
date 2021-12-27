<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Ventas</title>
    <link rel="stylesheet" href="css/mostrar_compras.css">
</head>
<body>
    <header>
        <div class="conteiner">
            <a href="home_admin.html">Regresar</a>
            <h1>Administración - Compras</h1>
        </div>
    </header>
    <section>
        <center>
            <table>
                <thead>
                    <tr>
                        <th>Id_compra</th>
                        <th>Id_dni_usuario</th>
                        <th>Id_producto</th>
                        <th>Cantidad</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("bd.php");

                    $query = "SELECT * FROM historial_compras";
                    $resultado = $conexion->query($query);
                    while ($row =$resultado->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id_compra'];?></td>
                        <td><?php echo $row['id_usuario'];?></td>
                        <td><?php echo $row['id_producto'];?></td>
                        <td><?php echo $row['cantidad'];?></td>
                        <td><?php echo $row['direccion'];?></td>
                        <td><?php echo $row['telefono'];?></td>
                        <td><?php echo $row['fecha'];?></td>
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
