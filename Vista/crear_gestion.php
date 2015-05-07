<?php
include '../Modelo/conexion.php';
$conectar = new conexion();
session_start();
include '../Controlador/ValidadorIntervaloFecha.php';
include '../Controlador/filtroXSS.php';
//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
$rolscape = mysql_real_escape_string($_POST['rol']);
$addini = $_POST['ini'];
$addfin = $_POST['fin'];
$addRol = filterXSS($rolscape);

$validador = new ValidadorFecha();
if ($validador->validarIntervalosFecha($addini, $addfin)){
    $seleccion = $conectar->consulta("SELECT NOM_G FROM gestion WHERE NOM_G = '$addRol'");
    $verificarG = mysql_fetch_row($seleccion);

    if (!is_array($verificarG)) 
    {            
        $seleccion = $conectar->consulta("SELECT NOM_G FROM gestion WHERE FECHA_INICIO_G = '$addini' and FECHA_FIN_G = '$addfin'");
        $verificarD = mysql_fetch_row($seleccion);
        if(!is_array($verificarD))
        {
            $peticion = $conectar->consulta("INSERT INTO `gestion` (`ID_G`, `NOM_G`, `FECHA_INICIO_G`, `FECHA_FIN_G`) VALUES (NULL, '$addRol', '$addini', '$addfin')");    
            echo"<script type=\"text/javascript\">alert('Se registro satisfactoriamenta la gestion'); window.location='add_gestion.php';</script>";    
        }
        else
        {
            echo"<script type=\"text/javascript\">alert('El rango de fechas esta siendo utilizado en otra gestion'); window.location='add_gestion.php';</script>";    
        }
    }
    else
    {
        echo"<script type=\"text/javascript\">alert('Ya existe una gestion con ese nombre'); window.location='add_gestion.php';</script>";
    }
}
else
 {
        echo"<script type=\"text/javascript\">alert('El formato de las fechas o el intervalo no es valido'); window.location='add_gestion.php';</script>";
}
?>
