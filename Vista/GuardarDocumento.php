<?php

include '../Modelo/conexion.php';
//include '../Modelo/ValidadorIntervaloFecha.php';
include '../Controlador/filtroXSS.php';
$conect = new conexion();
//$validador = new ValidadorFecha();
date_default_timezone_set('America/Puerto_Rico');

session_start();
$UsuarioActivo = $_SESSION['usuario'];
$proyecto = filterXSS($_POST['proyecto']);

$nombreDoc = filterXSS(trim($_POST['nombreDocumento']));
$FechaInicioEntrega = filterXSS(date("Y-m-d",strtotime($_POST['fechaInicioE'])));
$HoraInicioEntrega = filterXSS($_POST['horaInicioE']);
$FechaFinalEntrega = filterXSS(date("Y-m-d",strtotime($_POST['fechaFinalE'])));
$HoraFinalEntrega = filterXSS($_POST['horaFinalE']);
$DescripcionDocumento = filterXSS($_POST['DescripcionDocumento']);

//$fechaValida = true;
//$fechaValida = $fechaValida && $validador->validarTiempoFecha($FechaInicioEntrega) && $validador->validarTiempoFecha($FechaFinalEntrega);
//$fechaValida = $fechaValida && $validador->validarIntervalosFecha($FechaInicioEntrega, $FechaFinalEntrega);

//if($fechaValida) {

	$HoraRegistrado = date("H:i:s");
	$FechaRegistrado = date('Y:m:j');

	$VerificarExistenciaDoc = $conect->consulta("SELECT * FROM registro WHERE NOMBRE_U = '$UsuarioActivo' AND NOMBRE_R = '$nombreDoc'");

	$ExistenciaDoc = mysql_fetch_row($VerificarExistenciaDoc);

	if (is_array($ExistenciaDoc)) {

		echo "<SCRIPT LANGUAGE='javascript'> alert('Error, ya existe un registro con ese nombre'); window.history.back();</SCRIPT>";
	}
	else{

		$InsertarDocumento = $conect->consulta("INSERT INTO registro(NOMBRE_U, TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES('$UsuarioActivo','documento requerido','Habilitado','$nombreDoc','$FechaRegistrado', '$HoraRegistrado')");
		$SeleccionDocumentoID = $conect->consulta("SELECT MAX(ID_R) FROM registro WHERE NOMBRE_U='$UsuarioActivo' AND TIPO_T = 'documento requerido'");

		$DocId = mysql_fetch_row($SeleccionDocumentoID);

		$InsertarPlazo = $conect->consulta("INSERT INTO plazo VALUES('$DocId[0]','$FechaInicioEntrega','$FechaFinalEntrega','$HoraInicioEntrega','$HoraFinalEntrega')");

		$InsertarDescripcion  = $conect->consulta("INSERT INTO descripcion VALUES('$DocId[0]', '$DescripcionDocumento')");
		$proyecto_id = $conect->consulta("SELECT CODIGO_P FROM proyecto WHERE NOMBRE_P='$proyecto'");
		$p_id = mysql_fetch_row($proyecto_id);

		
		
		$InsertarProyecto = $conect->consulta("INSERT INTO documento_r VALUES('$DocId[0]', '$p_id[0]')");

		if ($InsertarDocumento and $InsertarPlazo and $InsertarDescripcion) {

				echo "<SCRIPT LANGUAGE='javascript'> alert('Exito, el registro del documento se realizo exitosamente.'); window.history.back();</SCRIPT>";
		}
		else {
		
			echo "<SCRIPT LANGUAGE='javascript'>". 
			            " alert('Error, no se pudo registrar el documento');".
			            " document.location=('../Vista/RegistrarDocumentosRequeridos.php');</SCRIPT>";
		}	
	}
//}
/*else {
	echo "<SCRIPT LANGUAGE='javascript'>". 
            " alert('La fecha no es valida');".
            " document.location=('../Vista/RegistrarDocumentosRequeridos.php');</SCRIPT>";
}*/
?>
