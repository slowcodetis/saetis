<?php

include '../Librerias/fpdf17/fpdf.php';
include '../Modelo/conexion_pd.php';
include 'ValidadorIntervaloFecha.php';
include '../Controlador/filtroXSS.php';

session_start();

$conexion = new conexion();
$validador = new ValidadorFecha();

$nombreUA = $_SESSION['usuario'] ;
$nomAp = $conexion->query("SELECT NOMBRES_A, APELLIDOS_A FROM asesor WHERE NOMBRE_U =  '$nombreUA' ");
$nombreAp = $nomAp->fetchObject();
$nomA = $nombreAp->NOMBRES_A;
$apeA = $nombreAp->APELLIDOS_A;
$nAsesor = $nomA." ".$apeA ;

    //if (isset($_POST['lista'])) {
        if (isset($_POST['fecha'])) {
            $fecha = filterXSS($_POST['fecha']);
            if($validador->validarTiempoFecha($fecha)){
                if (isset($_POST['hora'])) {
                    if (isset($_POST['lugar'])) {
                        $existeF = FALSE;
                        $nombreF = '../Repositorio/asesor/NotificacionConformidad.tex';
                        if (file_exists($nombreF)) {
                            $existeF = TRUE;
                        }
                                        
                        if($existeF) {
                            //$nEmpresa=filterXSS($_POST['lista']);
                            $nEmpresa=$_SESSION['nombreEmpresa']; 

                            //echo "<script> alert('$nEmpresa'); </script>";
                                   
                            if(strnatcasecmp($nEmpresa, "Seleccione una grupo empresa")!=0) {
                                $fecha = filterXSS($_POST['fecha']);
                                $hora = filterXSS($_POST['hora']);
                                $lugar = filterXSS($_POST['lugar']);
                                $arr = filterXSS($_POST['text']);
                                
                                $califi = array();

                                $queryStat = "SELECT ge.`NOMBRE_U` FROM `grupo_empresa` AS ge WHERE ge.`NOMBRE_LARGO_GE` LIKE '$nEmpresa'";
                                $stmt      = $conexion->query($queryStat);
                                $row       = $stmt->fetchObject();
                                $nombreUGE = $row->NOMBRE_U;

                                $queryStat = "SELECT gestion.FECHA_FIN_G FROM gestion, proyecto, inscripcion_proyecto WHERE proyecto.CODIGO_P = inscripcion_proyecto.CODIGO_P AND NOMBRE_U = '$nombreUGE' AND gestion.ID_G = proyecto.ID_G";
                                $stmt      = $conexion->query($queryStat);
                                $row       = $stmt->fetchObject();
                                $fechaFini = $row->FECHA_FIN_G;

                                $queryStat = "SELECT gestion.FECHA_INICIO_G FROM gestion, proyecto, inscripcion_proyecto WHERE proyecto.CODIGO_P = inscripcion_proyecto.CODIGO_P AND NOMBRE_U = '$nombreUGE' AND gestion.ID_G = proyecto.ID_G";
                                $stmt      = $conexion->query($queryStat);
                                $row       = $stmt->fetchObject();
                                $fechaIni = $row->FECHA_INICIO_G;

                                $queryStat = "SELECT ge.`NOMBRE_CORTO_GE` FROM `grupo_empresa` AS ge WHERE ge.`NOMBRE_LARGO_GE` LIKE '$nEmpresa'";
                                $stmt      = $conexion->query($queryStat);
                                $row       = $stmt->fetchObject();
                                $nombreCGE = $row->NOMBRE_CORTO_GE;  

                                $fraseClave = 'Notificacion de Conformidad de '. $nombreCGE;
                                $queryStat = "SELECT ID_R FROM `registro` WHERE NOMBRE_R ='$fraseClave' AND  TIPO_T = 'publicaciones'";
                                $stmt1 = $conexion->query($queryStat);
                                
                                $fraseClave = 'Orden de Cambio de '. $nombreCGE;
                                $queryStat = "SELECT ID_R FROM `registro` WHERE NOMBRE_R ='$fraseClave' AND  TIPO_T = 'publicaciones'";
                                $stmt2 = $conexion->query($queryStat);
                                
                                if($stmt1->fetchColumn() == 0 && $stmt2->fetchColumn() == 0) {

                                    if($validador->estaEnRango($fecha, $fechaIni, $fechaFini)) {

                                        $queryStat = "SELECT u.`CORREO_ELECTRONICO_U` FROM `usuario` AS u WHERE u.`NOMBRE_U` LIKE '$nombreUA'";
                                        $stmt      = $conexion->query($queryStat);
                                        $row       = $stmt->fetchObject();
                                        $correo    = $row->CORREO_ELECTRONICO_U;

                                        $queryStat = "SELECT a.`NOMBRES_A`, a.`APELLIDOS_A` FROM `asesor` AS a WHERE a.`NOMBRE_U` LIKE '$nombreUA'";
                                        $stmt      = $conexion->query($queryStat);
                                        $row       = $stmt ->fetchObject();
                                        $nomAs = $row->NOMBRES_A;
                                        $apeAs = $row->APELLIDOS_A;
                                        $nCompleto = $nomAs."  ".$apeAs;    
                                        
                                        $indice=0;
                                        foreach ($arr as $key => $value)
                                        {
                                            $califi [$indice] = $value;
                                            $indice++;
                                        }
                                        /******************************************/
                                        $queryProy = "SELECT proyecto.CODIGO_P FROM proyecto, inscripcion_proyecto WHERE proyecto.CODIGO_P = inscripcion_proyecto.CODIGO_P AND NOMBRE_U = '$nombreUGE'";
                                        $selProy = $conexion->query($queryProy);
                                        $rowProy = $selProy->fetchObject();
                                        $proy = $rowProy->CODIGO_P;

                                        $queryDocR = $conexion->query("SELECT * FROM documento_r WHERE documento_r.CODIGO_P = '$proy'");
                                        $docR = $queryDocR->rowCount();

                                        $consulta = $conexion->query("SELECT * FROM registro WHERE NOMBRE_U='$nombreUGE' AND TIPO_T='documento subido'");
                                        $DocSub = $consulta->rowCount();

                                        if(($DocSub == $docR) and $DocSub >= 1)
                                        {
                                            if(isset($_GET['id']))
                                            {
                                                //Modifca permisos de escritura en la carpeta "Repositorio"
                                                chmod("../Repositorio/", 0777);
                                                mkdir("../Repositorio/".$nombreUGE."/");
                                                mkdir("../Repositorio/".$nombreUGE."/NC", 0777);

                                                $dia = date(j);
                                                $mes = date(n);
                                                $anio = date(Y);

                                                $mesEspaniol = array('1' => 'enero','2' => 'febrero','3' => 'marzo','4' => 'abril','5' => 'mayo','6' => 'junio','7' => 'julio','8' => 'agosto','9' => 'septiembre','10' => 'octubre','11' => 'noviembre','12' => 'diciembre');
                                                $mes = $mesEspaniol[$mes];
                                                $fecha2 = $dia . ' de '. $mes . ' de '. $anio;
                                                $pdf = new PDF_MC_Table('P', 'mm', 'Letter');
                                                $pdf->AddPage('P');
                                                $pdf->SetFont('helvetica','',10);
                                                $pdf->SetMargins(35, 40 , 55);
                                                $pdf->SetAutoPageBreak(true,45); 
                                                
                                                $texto = 'TIS acepta la propuesta técnica presentada por su empresa: <b>'.$nEmpresa.'</b>. Por lo que solicita hacerse presente el <b>'.$fecha.'</b>, a horas <b>'.$hora.'</b> a realizar firma de contrato, en <b>'.$lugar.'</b>.';
                                                $texto1 = '  Paralelamnete se solicita, indicar el día de su preferencia para realizar revisiones, puesta en marcha y seguimiento de su propuesta de desarrollo en el tiempo que dure el contrato con TIS.';
                                                $texto2 = '  Asimismo, recordar que para el día de la firma del contrato se requiere de una copia física de la Boleta de Garantía, emitida a favor de TIS por parte de <b>'.$nEmpresa.'</b>.';

                                                $descripciones = array('  Cumplimiento de especificaciones del proponente',utf8_decode('  Claridad en la organización de la empresa proponente'),utf8_decode('  Cumplimiento de especificaciones técnicas'),'  Claridad en el proceso de desarrollo',utf8_decode('  Plazo de ejecución'),'  Precio total','  Uso de herramientas en el proceso de desarrollo');
                                                $puntajesReferenciales = array('15 puntos','10 puntos','30 puntos','10 puntos', '10 puntos','15 puntos','10 puntos');
                                                $pdf->SetFont('Helvetica','',18);
                                                $pdf->Cell(0,10,'',0,1,'C');
                                                $pdf->Ln();
                                                $pdf->Ln();
                                                $pdf->Ln();
                                                $pdf->Cell(0,15,utf8_decode('Notificación de conformidad'),0,1,'C');
                                                $pdf->SetFont('Helvetica','',12);
                                                $pdf->Cell(0,8,'Ma. Leticia Blanco Coca',0,1,'C');
                                                $pdf->Cell(0,8, $fecha2,0,1,'C');
                                                $pdf->Ln();
                                                $pdf->SetWidths(array(90,22,20,40));
                                                $pdf->SetFont('Helvetica','',10);
                                                $pdf->MultiCell(0, 5, '  TIS ha revisado la propuesta que su empresa a entregado y se ha puntuado de la siguiente manera:');
                                                $pdf->SetFont('Helvetica','B',10);
                                                srand(microtime()*1000000);
                                                $pdf->Row(array(utf8_decode('Descripción'), 'Puntaje Referencial', 'Puntaje Obtenido'));
                                                $pdf->SetFont('Helvetica','',10);
                                                for ($i = 0; $i < 7; $i++) {
                                                    $pdf->Row(array($descripciones[$i], '  '.$puntajesReferenciales[$i], '       '.$califi[$i]));
                                                }
                                                $pdf->Ln();
                                                $pdf->SetFont('Helvetica','',10);
                                                //$pdf->MultiCell(0, 5, utf8_decode('  TIS después de revisar la propuesta de su empresa '. $nEmpresa.', tiene las siguientes observaciones:'));                                        
                                                //$pdf->MultiCell(0,5,utf8_decode($texto));
                                                $pdf->writeHTML(utf8_decode($texto));
                                                $pdf->Ln();
                                                //$pdf->MultiCell(0,5,utf8_decode($texto));
                                                $pdf->MultiCell(0,5,utf8_decode($texto1));
                                                $pdf->writeHTML(utf8_decode($texto2));
                                                //$pdf->writeHTML('This is my disclaimer. <b>THESE WORDS NEED TO BE BOLD.</b> These words do not need to be bold.');

                                                //            mkdir("../Repositorio/".$nombreUGE."/NC");
                                                $pdf->Output('../Repositorio/'.$nombreUGE.'/NC/NotificacionConformidad.pdf','F');
                                                
                                                //Devolvemos las ordenes de cambio
                                                chmod("../Repositorio/", 0775);

                                                $id = "OrdenCambio";
                                                $pdf = $id.".pdf";
                                                
                                                $rutaD = "../".$nombreUGE."/NC/";

                                                $file = "NotificacionConformidad".'_'.$nEmpresa.'.pdf';

                                                    if (!file_exists($rutaD)) {
                                                        $oldmask = umask(0); 
                                                        mkdir($rutaD, 0777,TRUE);
                                                        umask($oldmask);
                                                        chown($rutaD, "bittle2014"); 
                                                        chgrp($rutaD, "webtis");

                                                        if(!file_exists("../".$nombreUGE."/index.html")) {
                                                            fopen("../".$nombreUGE."/index.html", "x");
                                                        }
                                                    }

                                                    $nruta = "../Repositorio/".$nombreUGE."/NC/"."NotificacionConformidad.pdf";
                                                    $fecha = date('Y-m-d');
                                                    $hora  = date("G:H:i");
                                                    $visible = "TRUE";
                                                    $descargar = "TRUE";
                                                    $nombreDoc = "Notificacion de Conformidad de ".$nombreCGE;
                                                    $nombDoc = "";

                                                    $consulta = $conexion->query("SELECT `NOMBRE_R` FROM `registro` WHERE `NOMBRE_R` LIKE '$nombreDoc' ");

                                                    $numRows = $consulta->rowCount();
                                                    
                                                    if($numRows>0){
                                                      $row= $consulta->fetchObject();
                                                      $nombDoc = $row->NOMBRE_R;
                                                    }
                                                    if (strcasecmp($nombreDoc, $nombDoc)!=0) {
                                                        $comentar = $conexion->query("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$nombreUA','publicaciones','Habilitado','$nombreDoc','$fecha','$hora')")or
                                                        die("Error");

                                                        $consulta = $conexion->query("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
                                                        $row = $consulta->fetchObject();
                                                        $id = $row -> ID_R;

                                                        $guardarD = $conexion->query("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D) VALUES('$id','1024','$nruta','$visible','$descargar')");
                                                        $desD=$conexion->query("INSERT INTO descripcion (ID_R,DESCRIPCION_D) VALUES('$id','Notificacion de Conformidad')");
                                                        $destina=$conexion->query("INSERT INTO receptor (ID_R,RECEPTOR_R) VALUES('$id','$nEmpresa')");
                                                        $guardar = $conexion->query("INSERT INTO periodo (ID_R,fecha_p,hora_p) VALUES ('$id','$fecha','$hora')") or
                                                        die("Error");
                                                        echo"<script type=\"text/javascript\">alert('Se genero correctamente la notificacion de conformidad'); window.location='../Vista/publicaciones.php';</script>";  
                                                    }
                                                    else {
                                                        echo"<script type=\"text/javascript\">alert('Ya se genero una notificacion de conformidad para la grupo empresa seleccionada'); window.location='../Vista/publicaciones.php';</script>";
                                                    }

                                                    $directorioIndex = "../".$nombreUGE."/NC/index.html";

                                            }   
                                        }
                                        else {
                                            echo"<script type=\"text/javascript\">alert('La grupo empresa seleccionada aun no ha subido todos los documentos requeridos'); window.history.back();</script>";  
                                        }
                                    } 
                                    else{
                                        echo"<script type=\"text/javascript\">alert('La fecha seleccionada esta fuera del rango de la gestion, seleccione otra por favor'); window.history.back();</script>";  
                                    } 
                                }
                                else {
                                    echo"<script>alert('Ya se genero una notificacion de conformidad o una orden de cambio para la grupo empresa seleccionada'); window.history.back();</script>";
                                }             
                            } 
                            else {        
                                echo"<script type=\"text/javascript\">alert('Por favor, seleccione una grupo empresa'); window.history.back();</script>";  
                            }
                        }
                        else {
                            echo"<script type=\"text/javascript\">alert('Por favor, suba la plantilla de Notificacion de Conformidad a su repositorio.'); window.location='../Vista/notificacion_conformidad.php';</script>";      
                        }
                    }       
                }
            }
            else {
                echo"<script type=\"text/javascript\">alert('La fecha ingresada es previa a la actual, seleccione otra.'); window.history.back();</script>";      
            }
        }
    //}
?>