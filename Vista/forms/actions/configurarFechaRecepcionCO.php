<?php
    session_start();
    error_reporting (5); 	
    include '../../../Modelo/conexion.php';

    $co=new conexion();
    $usuarioAse = $_SESSION['usuario'];

    $aceptar=$_POST["aceptarFecha"];
    $fechaIni = $_POST["fechaInicioE"];
    $fechaFin = $_POST["fechaFinalE"];

    $horaIni = $_POST["horaInicioE"];
    $horaFin = $_POST["horaFinalE"];
    $documentoR=$_POST["documentoRequerido"];
    $idDocumento=0;

    $fechaIniRegistrado="fechIni";
    $horaIniRegistrado="horIni";
    $fechaFinRegistrado="fechFin";
    $horaFinRegistrado="HorFin";

    $registros=$co->consulta("SELECT *".
            " FROM registro".
            " WHERE tipo_t= 'documento requerido'",$co) or die("Problemas en el select:".mysql_error());
    if(isset($documentoR)) {
        $SQL="SELECT p.fecha_inicio_pl, p.hora_inicio_pl, p.fecha_fin_pl, p.hora_fin_pl".
                    " FROM plazo p, registro r, tipo t".
                    " WHERE t.TIPO_T = r.TIPO_T".
                    " AND p.ID_R = r.ID_R".
                    " AND r.TIPO_T =  'documento requerido'".
                    " AND r.nombre_r ='$documentoR'".
                    " AND nombre_U='$usuarioAse'".
                    " LIMIT 0 , 30";
    	$registros=$co->consulta("$SQL",$co);
        
        while ($row = mysql_fetch_row($registros)) {
            $fechaIniRegistrado = trim($row[0]);
            $horaIniRegistrado = trim($row[1]);
            $fechaFinRegistrado = trim($row[2]);
            $horaFinRegistrado = trim($row[3]);
        }
        
        $seleccion= "SELECT id_R FROM registro WHERE nombre_r='$documentoR' AND TIPO_T = 'documento requerido' AND nombre_U='$usuarioAse'";
        $consulta = $co->consulta($seleccion);
        $idDocumento =  mysql_fetch_array($consulta);
        $idDocumento = $idDocumento[0];       
    }
    if(strnatcasecmp($documentoR, "Seleccione el documento a Modificar") != 0) {
        if($idDocumento!=0) {    
            if(isset($fechaIni)) {
                if(isset($horaIni)) {
                    if(isset($fechaFin)) {
                        if(isset($horaFin)) {
                            
                            $SQL="UPDATE plazo SET fecha_inicio_pl='$fechaIni' WHERE id_R='$idDocumento'";
                            $registros=$co->consulta("$SQL",$co);
                            
                            $SQL="Update plazo".
                                    " Set hora_inicio_pl='$horaIni'".
                                    "Where id_R='$idDocumento'";
                            $registros=$co->consulta("$SQL",$co);
                            
                            $SQL="Update plazo".
                                    " Set fecha_fin_pl='$fechaFin'".
                                    "Where id_R='$idDocumento'";
                            $registros=$co->consulta("$SQL",$co);
                            
                            $SQL="Update plazo".
                                    " Set hora_fin_pl='$horaFin'".
                                    "Where id_R='$idDocumento'";
                            $registros=$co->consulta("$SQL",$co);

                            echo "<script> alert('Exito,la configuracion de $documentoR fue registrada exitosamente.'); window.location= '../../ConfiguracionFechasRecepcion.php';</script>";                        
                        }    
                    }    
                }    
            }    
        } 
        else  {
            echo "<script> alert('Usted no selecciono ningun documento valido a configurar'); window.history.back(); </script>";
        }
    }
    else  {
        echo "<script> alert('Usted debe seleccionar un documento'); window.history.back(); </script>";
    }
?>