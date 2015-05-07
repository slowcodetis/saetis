<?php

session_start();
include '../Modelo/conexion.php';
include '../Controlador/filtroXSS.php';
$conectar = new conexion();
//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$addRol = filterXSS($_POST['rol']);



//conexion-------------

	//Peticion
	$peticion = $conectar-> consulta("INSERT INTO `rol` (`ROL_R`) VALUES ('$addRol');");
	//cerrar conexion--------------------------
	
	 //volver a la pagina---------------
	 echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=add_roles.php">
		</head>
	</html>';
 
?>
