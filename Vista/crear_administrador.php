
<?php

session_start();
include '../Modelo/conexion.php';
include '../Controlador/filtroXSS.php';

$conectar = new conexion();

//Crear variables--------------------------


$contador = 0;

$addUsuario = filterXSS($_POST['usuario']);
$addContra = filterXSS($_POST['contrasena']);
$contrasena2 = filterXSS($_POST['contrasena2']);
$addNombre = filterXSS($_POST['nombre']);
$addApellido = filterXSS($_POST['apellido']);
$addTelefono = filterXSS($_POST['telefono']);
$addEmail= filterXSS($_POST['email']);

$camposNoVacios = true;
$camposNoVacios = $camposNoVacios && strlen(trim($addUsuario)) > 0;
$camposNoVacios = $camposNoVacios && strlen(trim($addContra)) > 0;
$camposNoVacios = $camposNoVacios && strlen(trim($contrasena2)) > 0;
$camposNoVacios = $camposNoVacios && strlen(trim($addNombre)) > 0;
$camposNoVacios = $camposNoVacios && strlen(trim($addApellido)) > 0;
$camposNoVacios = $camposNoVacios && strlen(trim($addTelefono)) > 0;
$camposNoVacios = $camposNoVacios && strlen(trim($addEmail)) > 0;


if($camposNoVacios) {

    //comprobar si el usuario Existe
    $peticion1 =$conectar ->consulta("SELECT * FROM usuario");
    $peticion2 = $conectar ->consulta("SELECT * FROM usuario_rol");
    $peticion3 = $conectar ->consulta("SELECT * FROM asesor");
	
    
    if(strcmp($contrasena2, $addContra) == 0) {

        $conect = new conexion();
        
        $verificarUGE = $conect->consulta("SELECT NOMBRE_U FROM usuario WHERE NOMBRE_U = '$addUsuario' ");
        $verificarUGE2 = mysql_fetch_row($verificarUGE);
        
        if (!is_array($verificarUGE2)) {
            //conexion-------------		
            $peticion1 = $conectar ->consulta("INSERT INTO `usuario` (`NOMBRE_U`, `ESTADO_E`, `PASSWORD_U`, `TELEFONO_U`, `CORREO_ELECTRONICO_U`) VALUES ('$addUsuario', 'Habilitado', '$addContra', '$addTelefono', '$addEmail');");
            $peticion2 = $conectar ->consulta("INSERT INTO `usuario_rol` (`NOMBRE_U`, `ROL_R`) VALUES ('$addUsuario', 'administrador');");
            $peticion3 = $conectar ->consulta("INSERT INTO `administrador` (`NOMBRE_U`, `NOMBRES_AD`, `APELLIDOS_AD`) VALUES ('$addUsuario', '$addNombre ', '$addApellido');");
    	
            //cerrar conexion--------------------------
            //volver a la pagina---------------
            echo"<script type=\"text/javascript\">alert('El registro se realizo exitosamente'); window.location='principal.php';</script>";
        }
        else {
            echo"<script type=\"text/javascript\">alert('El nombre de usuario ya fue registrado por favor cambie de nombre'); window.location='registro_administrador.php';</script>";  
        }
    }
    else {
        echo"<script type=\"text/javascript\">alert('Las contrasenas ingresadas no coinciden'); window.location='registro_administrador.php';</script>";  
    }
}
else {
    echo"<script type=\"text/javascript\">alert('No puede existir uno o mas campos vacios'); window.history.back();</script>";  
}
?>