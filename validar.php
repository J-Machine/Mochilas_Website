<?php
$usuario = $_POST["_usuario"];
$contraseña = $_POST["_contraseña"];
session_start();
$_seccion['_usuario'] = $usuario;

include('bd.php');

$consulta = "CALL validar_usu_cliente('$usuario','$contraseña')";
$resultado = mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);//retoma si son los datos correctis

if($filas){
    header("location:home.php");//me envia a otra pagina
}else {
    ?>
    <?php
    include('index.html');
    ?>
    <h1 class="bad">Usuario o Contraseña incorrectos</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>