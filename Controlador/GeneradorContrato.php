<?php
  
  include '../Librerias/fpdf17/fpdf.php';
  include '../Modelo/conexion.php';
  session_start();
  $conexion = new conexion();

  if (isset($_POST['grupoempresa']))
  {
      $nLargoGE = $_REQUEST['grupoempresa'];
      $consulta="SELECT DISTINCT NOMBRE_R FROM `registro` AS r,`receptor` AS w WHERE  r.`ID_R` = w.`ID_R` AND r.`TIPO_T` LIKE 'Contrato' AND w.`RECEPTOR_R` = '$nLargoGE'";
      $contrato= $conexion->consulta($consulta);
      $cantC= mysql_num_rows($contrato);  
      
      if($cantC != 0 )
      {
         echo"<script type=\"text/javascript\">alert('Usted ya emitio un contrato para esta grupo empresa'); window.location='../Vista/contrato.php';</script>";  
      }
      else
      {
         $nombreF= '../Repositorio/asesor/Contrato.tex';
         $existeFile = FALSE;
         if (file_exists($nombreF))
         {
             $existeFile = TRUE;
         }
         if($existeFile)
         {
            if(strnatcasecmp($nLargoGE, "Seleccione una grupo empresa") != 0)
            {
                $seleccion="SELECT `NOMBRE_CORTO_GE` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nLargoGE'";            
                $consulta = $conexion->consulta($seleccion);
                $nCortoGE =  mysql_fetch_array($consulta);
                
                $nombreUA = $_SESSION['usuario'] ;
                $nomAp = $conexion->consulta("SELECT NOMBRES_A, APELLIDOS_A FROM asesor WHERE NOMBRE_U =  '$nombreUA' ");
                $nombreAp = mysql_fetch_row($nomAp);
                $asesor = $nombreAp[0]." ".$nombreAp[1] ;
    
                $seleccion = "SELECT `REPRESENTANTE_LEGAL_GE` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nLargoGE'";            
                $consulta = $conexion->consulta($seleccion);
                $represen = mysql_fetch_array($consulta);
                
                $seleccion = "SELECT `NOMBRE_U` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nLargoGE'";            
                $consulta = $conexion->consulta($seleccion);
                $nombreUGE = mysql_fetch_array($consulta);
                
                $seleccion = "SELECT p.`NOMBRE_P` FROM `proyecto` AS p, `inscripcion_proyecto` AS ip WHERE ip.`NOMBRE_U` = '$nombreUGE[0]' AND ip.`CODIGO_P` = p.`CODIGO_P`";
                $consulta = $conexion->consulta($seleccion);
                $sistema = mysql_fetch_array($consulta);
                
                $seleccion = "SELECT p.`CONVOCATORIA` FROM `proyecto` AS p, `inscripcion_proyecto` AS ip WHERE ip.`NOMBRE_U` = '$nombreUGE[0]' AND ip.`CODIGO_P` = p.`CODIGO_P`";
                $consulta = $conexion->consulta($seleccion);
                $convo = mysql_fetch_array($consulta);

                $consulta = $conexion->consulta("SELECT * FROM planificacion WHERE NOMBRE_U='$nombreUGE[0]' AND ESTADO_E='planificacion registrada'");
                $planifi = mysql_fetch_row($consulta);

                if (is_array($planifi))
                {       
                  $dia = date(j);
                  $mes = date(n);
                  $anio = date(Y);

                  $mesEspaniol = array('1' => 'enero','2' => 'febrero','3' => 'marzo','4' => 'abril','5' => 'mayo','6' => 'junio','7' => 'julio','8' => 'agosto','9' => 'septiembre','10' => 'octubre','11' => 'noviembre','12' => 'diciembre');
                  $mes = $mesEspaniol[$mes];
                  $fecha2 = $dia . ' de '. $mes . ' de '. $anio;
                  $pdf = new PDF_MC_Table('P', 'mm', 'Letter');
                  $pdf->AddPage('P');
                  $pdf->SetFont('helvetica','',10);
                  $pdf->SetMargins(35, 35 , 55);
                  $pdf->SetAutoPageBreak(true,45); 

$texto = 'Que suscriben la empresa Taller de Ingeniería de Software - TIS, que en lo sucesivo se denominará TIS, por una parte, y la consultora '.$nLargoGE.', registrada debidamente en el Departamento de Procesamiento de Datos y Registro e Inscripciones, domiciliada en la ciudad de Cochabamba, que en lo sucesivo se denominará '.$nCortoGE[0].', por otra parte, de conformidad a las claúsulas que se detallan a continuación:';
//$texto = 'Que suscriben la empresa Taller de Ingeniería de Software - TIS, que en lo sucesivo se denominará TIS, por una parte, y la consultora <b>'.$nLargoGE.'</b>, registrada debidamente en el Departamento de Procesamiento de Datos y Registro e Inscripciones, domiciliada en la ciudad de Cochabamba, que en lo sucesivo se denominará <b>'.$nCortoGE[0].'</b>, por otra parte, de conformidad a las claúsulas que se detallan a continuación:';
$parte1 = 'PRIMERA.- TIS contratará los servicios del Contratista para la provisión del '.$sistema[0].', consultoría que se realizará, conforme a la modalidad y presupuesto entregado por la Consultora, en su documento de propuesta técnica, y normas estipuladas por TIS.';
$parte2 = 'SEGUNDO.- El objeto de este contrato es la provisión de un producto software.';
$parte3 = 'TERCERO.- La consultora '.$nCortoGE[0].', se hace responsable por la buena ejecución de las distintas fases, que involucren su ingeniería del proyecto, especificadas en la propuesta técnica corregida de acuerdo al pliego de especificaciones.';
//$parte3 = 'TERCERO.- La consultora <b>'.$nCortoGE[0].'</b>, se hace responsable por la buena ejecución de las distintas fases, que involucren su ingeniería del proyecto, especificadas en la propuesta técnica corregida de acuerdo al pliego de especificaciones.';
$parte4 = 'CUARTO.- Para cualquier otro punto no estipulado en el presente contrato, debe hacerse referencia al CPTIS, al Pliego de Especificaciones y/o al PG-TIS (Plan Global - TIS)';
$parte5 = 'QUINTO.- Se pone en evidencia que cualquier incumplimiento de las cláusulas estipuladas en el presente contrato, es pasible a la disolución del mismo.';
$parte6 = 'SEXTO.- La consultora '.$nCortoGE[0].', declara su absoluta conformidad con los términos del presente contrato. Se deja constancia de que los datos y antecedentes personales jurídicos proporcionados por el adjudicatario son verídicos.';
$parte7 = 'SEPTIMO.- El presente contrato se disuelve también, por cualquier motivo de incumplimiento a normas establecidas en PG-TIS (Plan Global - TIS).';
$parte8 = 'OCTAVO.- Por la disolución del contrato, TIS tiene todo el derecho de ejecutar la boleta de garantía, que es entregada por el contratado como documento de seriedad de la empresa.';
$parte9 = 'NOVENO.- La información que TIS brinde al contratado debe ser de rigurosa confidencialidad, y no utilizarse para otros fines que no sea el desarrollo del proyecto.';
$parte10 = 'DECIMO.- TIS representada por su directorio Lic. Corina Flores V., Lic. M. Leticia Blanco C., Lic. David Escalera F., Lic. Patricia Rodriguez y Lic. Marco Montecinos, y por otra la consultora '.$nLargoGE.', representada por su representante legal '.$represen[0].', dan su plena conformidad a los términos y condiciones establecidos en el presente Contrato de Prestación de Servicios y Consultoría, firmando en constancia al pie de presente documento.';
//$parte10 = 'DECIMO.- TIS representada por su directorio Lic. Corina Flores V., Lic. M. Leticia Blanco C., Lic. David Escalera F., Lic. Patricia Rodriguez y Lic. Marco Montecinos, y por otra la consultora <b>'.$nLargoGE.'</b>, representada por su representante legal '.$represen[0].', dan su plena conformidad a los términos y condiciones establecidos en el presente Contrato de Prestación de Servicios y Consultoría, firmando en constancia al pie de presente documento.';
//$texto1 = '  Paralelamnete se solicita, indicar el día de su preferencia para realizar revisiones, puesta en marcha y seguimiento de su propuesta de desarrollo en el tiempo que dure el contrato con TIS.';
$parteFecha = 'Cochabamba, '.$fecha2;
//$texto2 = '  Asimismo, recordar que para el día de la firma del contrato se requiere de una copia física de la Boleta de Garantía, emitida a favor de TIS por parte de <b>'.$nEmpresa.'</b>.';

                  $descripciones = array('  Cumplimiento de especificaciones del proponente',utf8_decode('  Claridad en la organización de la empresa proponente'),utf8_decode('  Cumplimiento de especificaciones técnicas'),'  Claridad en el proceso de desarrollo',utf8_decode('  Plazo de ejecución'),'  Precio total','  Uso de herramientas en el proceso de desarrollo');
                  $puntajesReferenciales = array('15 puntos','10 puntos','30 puntos','10 puntos', '10 puntos','15 puntos','10 puntos');
                  $pdf->SetFont('Helvetica','',22);
                  $pdf->Cell(0,10,'',0,1,'C');
                  $pdf->Ln();
                  $pdf->Ln();
                  $pdf->Ln();
                  $pdf->Cell(0,15,utf8_decode('CONTRATO DE PRESTACIÓN DE'),0,1,'C');
                  $pdf->Cell(0,15,utf8_decode('SERVICIOS - CONSULTORÍA'),0,1,'C');
                  $pdf->Ln();
                  $pdf->SetFont('Helvetica','',12);
                  $pdf->Cell(0,8, $fecha2,0,1,'C');
                  $pdf->Ln();
                  $pdf->SetFont('Helvetica','',10);
                  
                  $pdf->SetFont('Helvetica','',10);
                  //$pdf->MultiCell(0,5,utf8_decode($texto));
                  $pdf->MultiCell(0,5,utf8_decode($texto));
                  //$pdf->writeHTML(utf8_decode($texto));
                  //$pdf->Ln();
                  $pdf->MultiCell(0,5,utf8_decode($parte1));
                  $pdf->MultiCell(0,5,utf8_decode($parte2));
                  $pdf->MultiCell(0,5,utf8_decode($parte3));
                  //$pdf->writeHTML(utf8_decode($parte3));
                  //$pdf->Ln();
                  $pdf->MultiCell(0,5,utf8_decode($parte4));
                  $pdf->MultiCell(0,5,utf8_decode($parte5));
                  //$pdf->writeHTML(utf8_decode($parte6));
                  //$pdf->Ln();
                  $pdf->MultiCell(0,5,utf8_decode($parte6));
                  $pdf->MultiCell(0,5,utf8_decode($parte7));
                  $pdf->MultiCell(0,5,utf8_decode($parte8));
                  $pdf->MultiCell(0,5,utf8_decode($parte9));
                  $pdf->MultiCell(0,5,utf8_decode($parte10));
                  //$pdf->writeHTML(utf8_decode($parte10));
                  //$pdf->Ln();
                  $nombCorto = $nCortoGE[0];
                  $pdf->Cell(0,10, $parteFecha, 0, 0, 'C');
                  $pdf->Ln();
                  $pdf->Ln();
                  $pdf->Ln();
                  $pdf->Ln();
                  $pdf->Cell(50,10, 'REPRESENTATE', 0, 0, 'C');$pdf->Cell(0,10, $represen[0], 0, 0, 'C');
                  $pdf->Ln();
                  $pdf->Cell(50,10, 'MIEMBRO DIRECTORIO', 0, 0, 'C');$pdf->Cell(0,10, 'CONSULTORA', 0, 0, 'C');
                              mkdir('../Repositorio/'.$nombreUA.'/Contratos/');
                  $pdf->Output('../Repositorio/'.$nombreUA.'/Contratos/Contrato'.$nombCorto.'.pdf','F');
                  
                  
                  $pdf = 'Contrato'.$nombCorto.".pdf"; 
                  $descrip = "../Repositorio/".$nombreUA."/Contratos/".$pdf;
                  $fecha = date('Y-m-d');
                  $hora = date("G:H:i");
                  $visible = "TRUE";
                  $descargar = "TRUE";
                  $comentar = $conexion->consulta("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$nombreUA','Contrato','Habilitado','$pdf','$fecha','$hora')")or
                  die("Error");
                                                 
                  $consultar= $conexion->consulta("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
                  
                  if ($regis = mysql_fetch_row($consultar)) {
                      $idRegis = trim($regis[0]);
                  }       
                                                 
                  $guardar = $conexion->consulta("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D) VALUES('$idRegis','1024','$descrip','$visible','$descargar')");
                  $desD = $conexion->consulta("INSERT INTO descripcion (ID_R,DESCRIPCION_D) VALUES('$idRegis','Contrato')");
                  $destinat = $conexion->consulta("INSERT INTO receptor (ID_R,RECEPTOR_R) VALUES('$idRegis','$nLargoGE')");
                   
                  $selGE=$conexion->consulta("SELECT `NOMBRE_U` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nLargoGE'");
                  $nomGE=mysql_fetch_array($selGE);

                   $estaFir=  $conexion->consulta("UPDATE `inscripcion_proyecto` SET `ESTADO_CONTRATO`= 'Firmado' WHERE `NOMBRE_U` = '$nomGE[0]'");  
                  
                  echo"<script type=\"text/javascript\">alert('Se genero el contrato correctamente'); window.location='../Vista/documentos_generados.php';</script>";                    
                }
                else
                {
                    echo"<script type=\"text/javascript\">alert('La grupo empresa seleccionada no ha registrado aun su planificacion'); window.location='../Vista/contrato.php';</script>";  

                }
                
            }
            else{        
            
               echo"<script type=\"text/javascript\">alert('Por favor, seleccione una grupo empresa'); window.history.back();</script>";  
            }
        }
        else
        {
             echo"<script type=\"text/javascript\">alert('Por favor, suba la plantilla del Contrato a su repositorio); window.location='../Vista/contrato.php';</script>";
                                
        }
        
      }
  }
?>