<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Productos</title>
    <link rel="stylesheet" href="css/mostrar_productos.css">
</head>
<body>
<header>
    <div class="conteiner">
        <a href="home_admin.html">Regresar</a>
        <h1>Administración - Productos</h1>
    </div>
</header>
<section id="banner">
    <nav>
        <form action="registrar_producto.php" method="post" enctype="multipart/form-data">
            <h1 id="titulo">Registro de Nuevo Producto</h1>
            <p>Nombre del Producto
                <input type="text" placeholder="Ingrese su nombre " name="_nombre" >
            </p>
            <p>Precio
                <input type="number" placeholder="Ingrese el precio unitario" name="_precio" step="0.1">
            </p>
            <p>Tipo producto
                <input type="text" placeholder="Ingrese tipo del producto" name="_tipo">
            </p>
            <p>Descripción
                <input type="text" placeholder="Ingrese una descripción" name="_descripcion">
            </p>
            <p>Stock
                <input type="number" placeholder="Ingrese su numero de stock" name="_stock">
            </p>
            <p>Imagen
                <input type="file" class="form-control-file" name="_imagen">
            </p>
                <input type="submit" id="btn" value="Confirmar">
        </form>
    </nav>
            
    <article>
    <table>
            <thead>
                 <tr>
                    <th>Id_automatico</th>
                    <th>Nombre</th>
                    <th>Precio S/.</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>stock</th>
                    <th>Imagen</th>
                    <th>Modificar Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("bd.php");

                $query = "SELECT * FROM compras.producto";
                $resultado = $conexion->query($query);
                while ($row =$resultado->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id_producto'];?></td>
                    <td><?php echo $row['nombre_producto'];?></td>
                    <td><?php echo $row['precio'];?></td>
                    <td><?php echo $row['tipo_producto'];?></td>
                    <td><?php echo $row['descripción'];?></td>
                    <td><?php echo $row['stock'];?></td>
                    <td><img height="150px" src="data:image/jpg;base64,<?php echo base64_encode($row["imagen"]);?>"></td>
                    <td id="botones"> <a href="modificando.php?id=<?php echo $row["id_producto"];?>">Modificar</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </article>
</section>
</body>
</html>