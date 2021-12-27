<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

   include('bd.php');

    try {
        $dni= (int)($_POST['_dni']);
        $name = $_POST['_nombre'];
        $primer = $_POST['_primer'];
        $segundo = $_POST['_segundo'];
        $telef = (int)($_POST['_telefono']);
        $correo = $_POST['_correo'];
        $usuario = $_POST['_usuario'];
        $contraseña = $_POST['_contraseña'];
        
        $registrar = "CALL registrar_usuario(".$dni.",'".$name."','".$primer."','".$segundo."','".$correo."','".$usuario."','".$contraseña."',".$telef.")";
        $resultado = mysqli_query($conexion,$registrar);
        if (!$resultado) {
            echo "Fallo de preparación:(".$conexion->errno.")".$conexion->error;
        }else{
            echo "Registro Correcto";
            header("location:home.php");
        }
    } catch (Exception $e) {
        echo 'Exception: ', $e->getMessage();
    }
    mysqli_close($conexion);
?>