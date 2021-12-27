<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar venta</title>
    <link rel="stylesheet" href="css/venta.css">
</head>
<body>
    <?php
    include("bd.php");

    $id = $_REQUEST['id'];

    $query = "SELECT * FROM compras.producto WHERE id_producto = '$id'";
    $resultado = $conexion->query($query);
    $row =$resultado->fetch_assoc();
    ?>
    <header>
        <div class="conteiner">
            <a href="home_admin.html">Regresar</a>
            <h1>Confirmar Venta</h1>
        </div>
    </header>
    <section>
        <nav>
            <form action="proceso_confirmado.php" method="POST">
                <h1>Confirme sus Datos</h1>
                <p>Nombre del producto
                <input type="text" required name="_nombre" placeholder="nombre..." value="<?php echo $row['nombre_producto'];?>" readonly>
                </p>
                <p>ID del producto
                <input type="text" required name="_id" placeholder="nombre..." value="<?php echo $row['id_producto'];?>" readonly>
                </p>
                <img height=200px" src="data:image/jpg;base64,<?php echo base64_encode($row["imagen"]);?>">
                <p>Cantidad
                <input type="number" required name="_cantidad">
                </p>
                <p>DNI de usuario
                    <input type="number" name="_dni" placeholder="ingrese su dni de usuario">
                </p>
                <p>Dirección de envio
                    <input type="text" name="_direccion">
                </p>
                <input type="submit" value="CONFIRMAR">
            </form>
        </nav>
    </section>
</body>
</html>