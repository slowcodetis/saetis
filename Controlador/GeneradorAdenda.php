<html>
    
    <head>
        <script src="../Librerias/js/bootstrap-dialog.js"></script>
    </head>
    
</html>

<?php

    include '../Librerias/fpdf17/fpdf.php';  
    include '../Modelo/conexion_pd.php';
    include '../Controlador/filtroXSS.php';
    date_default_timezone_set ('America/La_Paz');

    session_start();
    $conexion = new conexion();
    
    $nombreUA = $_SESSION['usuario'] ;
    $nomAp = $conexion->query("SELECT NOMBRES_A, APELLIDOS_A FROM asesor WHERE NOMBRE_U =  '$nombreUA' ");
    $nombreAp = $nomAp->fetchObject();
    $nomA = $nombreAp->NOMBRES_A;
    $apeA = $nombreAp->APELLIDOS_A;
    $nAsesor = $nomA." ".$apeA ;

    if (isset($_POST['lista'])) {
        $nEmpresa=filterXSS($_POST['lista']); 

        if(strnatcasecmp($nEmpresa, "Seleccione una grupo empresa")!=0) {
            $fechaReunion = filterXSS($_POST['fecha']);
            $horaReunion = filterXSS($_POST['hora']);
            $lugar = filterXSS($_POST['lugar']);
            $arr = filterXSS($_POST['text']);
            
            $califi = array();
            $observ =array();
            $encontrar = false;
            $indice = 1;
            
            while (!$encontrar) {
                if(isset($_POST['nombre'.$indice])) {
                  $observ[] = $_POST['nombre'.$indice];
                }
                else {
                    $encontrar = true;
                }
                $indice++;
            }
            
            $vacio =FALSE;
            for ($i=0;$i<count($observ);$i++) {
                if($observ[$i]==null || $observ[$i]=="" || $observ[$i]==" ") {
                    $vacio = TRUE;
                }
            }
            if($observ == NULL || $vacio == TRUE) {
                echo "<script type=\"text/javascript\">alert('Las observaciones no pueden estar en blanco '); window.history.back();</script>";
            }
            else {
                $queryStat = "SELECT ge.`NOMBRE_U` FROM `grupo_empresa` AS ge WHERE ge.`NOMBRE_LARGO_GE` LIKE '$nEmpresa'";
                $stmt      = $conexion->query($queryStat);
                $row       = $stmt->fetchObject();
                $nombreUGE = $row->NOMBRE_U;

                $queryStat = "SELECT ge.`NOMBRE_CORTO_GE` FROM `grupo_empresa` AS ge WHERE ge.`NOMBRE_LARGO_GE` LIKE '$nEmpresa'";
                $stmt      = $conexion->query($queryStat);
                $row       = $stmt->fetchObject();
                $nombreCGE = $row->NOMBRE_CORTO_GE; 
                
                $fraseClave = 'Orden de Cambio de '. $nombreCGE;
                $sql = "SELECT count(ID_R) FROM `registro` WHERE NOMBRE_R = '$fraseClave' AND  TIPO_T = 'publicaciones'";
                $result = $conexion->prepare($sql); 
                $result->execute(); 
                $ordenCambio = $result->fetchColumn(); 

                $sql = "SELECT count(ID_R) FROM `registro` WHERE NOMBRE_U = '$nombreUGE' AND TIPO_T = 'documento subido orden de cambio'";
                $result = $conexion->prepare($sql); 
                $result->execute();
                $docSubidos= $result->fetchColumn();

                $sql = "SELECT count(USUARIO_ID) FROM `documento_requerido_oc` WHERE USUARIO_ID = '$nombreUGE'";
                $result = $conexion->prepare($sql); 
                $result->execute();
                $docRequeridos= $result->fetchColumn();
                
                if($ordenCambio == 1){

                    if($ordenCambio == 1 && $docRequeridos == $docSubidos) {

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
                        
                        $fraseClave = 'Adenda de '. $nombreCGE;
                        $sql = "SELECT count(ID_R) FROM `registro` WHERE NOMBRE_R = '$fraseClave' AND  TIPO_T = 'publicaciones'";
                        $result = $conexion->prepare($sql); 
                        $result->execute(); 
                        $adendaEmitida = $result->fetchColumn();

                        if($adendaEmitida == 0) {

                            if(isset($_GET['id'])) {

                                //Modifca permisos de escritura en la carpeta "Repositorio"
                                chmod("../Repositorio/", 0777);
                                mkdir("../Repositorio/".$nombreUGE."/");
                                mkdir("../Repositorio/".$nombreUGE."/Adenda", 0777);

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

                                    $texto = 'TIS ha revisado la propuesta corregida y aun se tienen discrepancias, por lo que, en consenso con la empresa '. $nEmpresa .', se acuerda lo siguiente:';
                                    $texto1 = 'TIS y la empresa '.$nEmpresa.', ';

    							$pdf->SetFont('Helvetica','',18);
    							$pdf->Cell(0,10,'',0,1,'C');
    							$pdf->Ln();
    							$pdf->Ln();
    							$pdf->Ln();
    							$pdf->Cell(0,15,'Adenda',0,1,'C');
    							$pdf->SetFont('Helvetica','',12);
    							$pdf->Cell(0,8,'Ma. Leticia Blanco Coca',0,1,'C');
    							$pdf->Cell(0,8, $fecha2,0,1,'C');
    							$pdf->Ln();
    							$pdf->SetWidths(array(90,22,20,40));
    							$pdf->SetFont('Helvetica','',10);
    							$pdf->Ln();
                                $pdf->MultiCell(0,5,utf8_decode($texto));
    							for ($i=1; $i <= count($observ); $i++) { 
    								$pdf->MultiCell(0, 5, '    '.$i.'. '.$texto1.utf8_decode($observ[$i-1]));
    							}
    							$pdf->Ln();

    								mkdir("../Repositorio/".$nombreUGE."/Adenda");
    							$pdf->Output('../Repositorio/'.$nombreUGE.'/Adenda/Adenda.pdf','F');
    						      
                                    chmod("../Repositorio/", 0775);

                                $rutaD="../Repositorio/asesor/".$nombreUGE."/Adenda/";
                                $file = "Adenda".'_'.$nEmpresa.'.pdf';
                                if (!file_exists($rutaD)) {
                                    $oldmask = umask(0); 
                                    mkdir($rutaD, 0777,TRUE);
                                    umask($oldmask);
                                    if(!file_exists("../".$nombreUGE."/index.html")) {
                                        fopen("../".$nombreUGE."/index.html", "x");
                                    }
                                }

                                $id = "Adenda";
                                $pdf = $id.".pdf"; 
                                
                                $nruta = "../Repositorio/".$nombreUGE."/Adenda/"."Adenda.pdf";
                                $fecha = date('Y-m-d');
                                $hora  = date("G:H:i");
                                $visible = "TRUE";
                                $descargar = "TRUE";
                                $nombreDoc = "Adenda de ".$nombreCGE;
                                
                                $comentar = $conexion->query("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$nombreUA','publicaciones','Habilitado','$nombreDoc','$fecha','$hora')")or die("Error");
                                $consulta = $conexion->query("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
                                $row = $consulta->fetchObject();
                                $id = $row -> ID_R;
                                $guardarD = $conexion->query("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D) VALUES('$id','1024','$nruta','$visible','$descargar')");
                                $desD = $conexion->query("INSERT INTO descripcion (ID_R,DESCRIPCION_D) VALUES('$id','Adenda')");
                                $destinat = $conexion->query("INSERT INTO receptor (ID_R,RECEPTOR_R) VALUES('$id','$nEmpresa')");
                                $guardar = $conexion->query("INSERT INTO periodo (ID_R,fecha_p,hora_p) VALUES ('$id','$fecha','$hora')") or die("Error");
                                
                                echo"<script type=\"text/javascript\">alert('Se genero correctamente la Adenda'); window.location='../Vista/publicaciones.php';</script>";
                            }//---- FIN if(isset($_GET['id']))
                        }//--- FIN if($adendaEmitida == 0)
                        else {
                            echo"<script>alert('Ya se genero una adenda para la grupo empresa seleccionada'); window.location='../Vista/publicaciones.php';</script>";  
                        }     
                    }//--- FIN if($ordenCambio == 1 && $docRequeridos == $docSubidos)
                    else {
                        echo"<script type=\"text/javascript\">alert('La grupo empresa seleccionada aun no ha subido todos los documentos requeridos');  window.history.back();</script>"; 
                    }
                }
                else {
                    echo"<script type=\"text/javascript\">alert('La grupo empresa seleccionada no recibio una orden de cambio');  window.history.back();</script>"; 
                }
            }//--- FIN else
        }
        else {        
            echo"<script type=\"text/javascript\">alert('Por favor, seleccione una grupo empresa');  window.history.back();</script>";  
        }
    }
?>