<?php
    include '../Modelo/conexion.php';
    session_start();

    $conexion = new conexion();
    $nombreUGE = $_SESSION['usuario'];
    
    $correo = $_POST['correo'];
    $telef = $_POST['telefono'];
    $direc = $_POST['direccion'];
    $contrasena = $_POST['contrasena1'];
    
    $nuevaContrasena = $_POST['contrasena2'];
    $nuevaContrasenaRepeticion = $_POST['contrasena3'];

    if($nuevaContrasena == $nuevaContrasenaRepeticion) {
        $conexion->consulta(" UPDATE usuario SET PASSWORD_U='$contrasena', TELEFONO_U='$telef', CORREO_ELECTRONICO_U='$correo' WHERE NOMBRE_U = '$nombreUGE'");
        $conexion->consulta(" UPDATE grupo_empresa SET DIRECCION_GE='$direc' WHERE NOMBRE_U = '$nombreUGE'");
                          
        echo"<script type=\"text/javascript\">alert('Se modificaron los datos satisfactoriamente'); window.location='ModificarGrupoEmpresa.php';</script>";    
    }
    else {
        echo"<script type=\"text/javascript\">alert('Los datos no pudieron modificarse por inconsistencia de los mismos'); window.location='ModificarGrupoEmpresa.php';</script>";
    }
    
         
?>