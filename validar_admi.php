<?php
$usuario = $_POST["_usuario"];
$contraseña = $_POST["_contraseña"];
session_start();
$_seccion['_usuario'] = $usuario;

include('bd.php');

$consulta = "CALL validar_administrador('$usuario','$contraseña')";
$resultado = mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);//retoma si son los datos correctis

if($filas){
    header("location:home_admin.html");//me envia a otra pagina
}else {
    ?>
    <?php
    include('login_admi.php');
    ?>
    <h1 class="bad">Usuario o Contraseña incorrectos</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>