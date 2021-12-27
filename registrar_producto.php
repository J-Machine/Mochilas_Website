<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

   include('bd.php');

    try {
        $name= $_POST['_nombre'];
        $precio = $_POST['_precio'];
        $tipo = $_POST['_tipo'];
        $descripcion = $_POST['_descripcion'];
        $stock = (int)($_POST['_stock']);
        $imagen = addslashes(file_get_contents($_FILES['_imagen']['tmp_name']));
        
        $registrar = "CALL registrar_producto('".$name."',".$precio.",'".$tipo."','".$descripcion."',".$stock.",'".$imagen."')";
        $resultado = mysqli_query($conexion,$registrar);
        if (!$resultado) {
            echo "Fallo de preparación:(".$conexion->errno.")".$conexion->error;
        }else{
            echo "Registro Correcto";
            header("location:mostrar_productos.php");
        }
    } catch (Exception $e) {
        echo 'Exception: ', $e->getMessage();
    }
    mysqli_close($conexion);
?>