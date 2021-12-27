<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta confirmada</title>
</head>
<body>
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

    include('bd.php');
        try {
            $name= $_POST['_nombre'];//nombre del producto
            $id=(int)($_POST['_id']); //id del producto
            $dni = (int)($_POST['_dni']);
            $cantidad = (int)($_POST['_cantidad']);
            $direccion = $_POST['_direccion'];
            
            $registrar = "CALL registrar_venta2(".$dni.")";#
            $resultado = mysqli_query($conexion,$registrar);
            if (!$resultado) {
                ?>
                <h1 class="bad">El DNI no pertenece a este usuario</h1>
                <?php
            }else{
                $query = "SELECT MAX(id_compra) FROM compra WHERE id_usuario = '$dni'";
                $resultado2 = mysqli_query($conexion,$query);
                
                if (!$resultado2) {
                    echo "Fallo de preparación:(".$conexion->errno.")".$conexion->error;
                }else{
                    $row =$resultado2->fetch_assoc();
                    $id_compra = $row['MAX(id_compra)'];
                    $registrar1 = "CALL registrar_venta(".$id_compra.",".$id.",".$cantidad.",'".$direccion."')";;
                    $resultado3 = mysqli_query($conexion,$registrar1);
                    if (!$resultado3) {
                        echo "Fallo de preparación:(".$conexion->errno.")".$conexion->error;
                    }else{
                        echo "Fallo de preparación:(".$conexion->errno.")".$conexion->error;
                    }
                }
                #echo "Registro Correcto";
                #
            }
            $query1="SELECT telefono FROM usuario WHERE id_dni = '$dni'";
            $date = date('Y-m-d H:i:s');
            $resultado4 = mysqli_query($conexion,$query1);
            if (!$resultado4) {
                echo "Fallo de preparación:(".$conexion->errno.")".$conexion->error;
            }else{
                $row1 =$resultado4->fetch_assoc();
                $telef = $row1['telefono'];
                $registrar4 = "CALL registrar_historial(".$id_compra.",".$dni.",".$id.",".$cantidad.",'".$direccion."',".$telef.",'".$date."')";;
                $resultado5 = mysqli_query($conexion,$registrar4);
                if (!$resultado5) {
                    echo "Fallo de preparación:(".$conexion->errno.")".$conexion->error;
                }else{
                    echo "Fallo de preparación:(".$conexion->errno.")".$conexion->error;
                }
            }
        } catch (Exception $e) {
            echo 'Exception: ', $e->getMessage();
        }

        mysqli_close($conexion);
        header("location:compra_terminada.php");
    ?>
</body>
</html>