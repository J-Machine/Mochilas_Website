<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Productos</title>
    <link rel="stylesheet" href="css/vender_productos.css">
</head>
<body>
    <header>
        <div class="conteiner">
            <a href="home.php">Regresar</a>
            <h1>Productos</h1>
        </div>
    </header>
    <section>
        <center>
            <table>
                <thead>
                    <tr>
                        <th>Código del producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>stock</th>
                        <th>Imagen</th>
                        <th>Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("bd.php");

                    $query = "SELECT * FROM compras.producto";
                    $resultado = $conexion->query($query);
                    while ($row =$resultado->fetch_assoc()) {
                    ?>
                    <tr id="casilla">
                        <td><?php echo $row['id_producto'];?></td>
                        <td><?php echo $row['nombre_producto'];?></td>
                        <td><?php echo "S/. ".$row['precio'];?></td>
                        <td><?php echo $row['descripción'];?></td>
                        <td><?php echo $row['stock'];?></td>
                        <td><img height="150px" src="data:image/jpg;base64,<?php echo base64_encode($row["imagen"]);?>"></td>
                        <td id="botones"><a href="venta.php?id=<?php echo $row['id_producto'];?>">Comprar</a></td>
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