<?php
    include('bd.php');
        $sprod= (int)($sprod);
        $id = $_REQUEST['id'];
        $id2 = $_REQUEST['sport'];
        $consultar = "UPDATE compras.producto SET stock = '$id2' WHERE (id_producto = '$id')";
        $results = mysqli_query($conexion,$consultar);
        if (!$results) {
            echo "Fallo de preparación:(".$conexion->errno.")".$conexion->error;
        }else{
            echo "Fallo de preparación:(".$conexion->errno.")".$conexion->error;
        }
        header("location:mostrar_productos.php");
?>