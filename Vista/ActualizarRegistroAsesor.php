<?php
session_start();
    include '../Modelo/conexion.php';

    include '../Controlador/filtroXSS.php';

    $conectar = new conexion();
    $name = filterXSS($_POST['nombreUsuario']);
    $RealName = filterXSS($_POST['nombreReal']);
    $password = filterXSS($_POST['password']);
    $emailUsuario = filterXSS($_POST['email']);
    $apellidoUsuario = filterXSS($_POST['apellido']);
    $telefonoUsuario = filterXSS($_POST['telefono']);


$updLogin=$_SESSION['usuario'];




//Peticion------------------------------------------
$conectar->consulta("UPDATE usuario SET NOMBRE_U='$updLogin',PASSWORD_U='$password',TELEFONO_U='$telefonoUsuario',CORREO_ELECTRONICO_U='$emailUsuario'
WHERE  NOMBRE_U='$updLogin'");
$conectar->consulta("UPDATE asesor SET NOMBRE_U='$updLogin',NOMBRES_A='$RealName',APELLIDOS_A='$apellidoUsuario'
WHERE  NOMBRE_U='$updLogin'");
$conectar->consulta("UPDATE usuario_rol SET NOMBRE_U='$updLogin'
WHERE  NOMBRE_U='$updLogin'");


echo"<script type=\"text/javascript\">alert('Se modificaron los datos satisfactoriamente'); window.location='inicio_asesor.php';</script>";



   
 
   
?>
