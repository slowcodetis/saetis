<?php
session_start();

include '../Modelo/conexion.php';
$conexion = new conexion();


if(isset($_POST['registrar']))
{
    $asesor=$_POST['asesor'];
    
    if(isset($_SESSION['usuario'])) //$_POST['ge']))
    {
        $grupoE = $_SESSION['usuario'];
    }
        //$nombreUs= 
    if($asesor == "Seleccione un Asesor")
    {
        echo"<script type=\"text/javascript\">alert('No seleccion\u00f3 ningun asesor'); window.history.back();</script>"; 
    }
    else
    {
        $seleccion = "SELECT count(*) "
                        . "FROM inscripcion "
                        . "WHERE NOMBRE_UGE='".$grupoE."'";
        $consulta = $conexion->consulta($seleccion);
        $cont =  mysql_fetch_row($consulta);
        $bandera=$cont[0];
        
        if($bandera == 0)
        {
            $seleccion="SELECT id_g "
                    . "FROM gestion "
                    . "WHERE DATE (NOW()) > DATE(FECHA_INICIO_G) and DATE(NOW()) < DATE(FECHA_FIN_G)";
            $consulta=$conexion->consulta($seleccion);
            $idGestion=mysql_fetch_row($consulta);
            $idGestion_= $idGestion[0];

            $separar = explode(' ', $asesor);
            $count = count($separar);
            $apellido = $separar[1];
            if( $count == 3)
            {
                $apellido = $apellido." ".$separar[2];
            }

                //echo"<script type=\"text/javascript\">alert('separar: $separar[0]'); </script>";
                //echo"<script type=\"text/javascript\">alert('apeliido: $apellido'); </script>";
                echo"<script type=\"text/javascript\">alert('nombreUs: $grupoE'); </script>";

            $seleccion = "SELECT nombre_u "
                    . "FROM asesor "
                    . "WHERE NOMBRES_A LIKE '". $separar[0]."' and APELLIDOS_A LIKE '".$apellido."'";
            $consulta = $conexion->consulta($seleccion);
            $nombre =  mysql_fetch_row($consulta);
            $nombreU = $nombre[0];

            //echo "$nombreU <br> $grupoE <br> $nombreUs <br>";

            $insertar="INSERT INTO inscripcion(NOMBRE_UA, NOMBRE_UGE, ESTADO_INSCRIPCION) VALUES ('".$nombreU."','".$grupoE."', 'Deshabilitado')";

            echo "INSERT INTO inscripcion(NOMBRE_UA, NOMBRE_UGE, ESTADO_INSCRIPCION) VALUES ('".$nombreU."','".$grupoE."', 'Deshabilitado') <br>";

            $conexion->consulta($insertar);
                    
            echo"<script type=\"text/javascript\">alert('Asesor elegido'); window.history.back();</script>";
        }
        else
        {
            echo"<script type=\"text/javascript\">alert('Usted ya eligi\u00f3 un asesor anteriormente'); window.history.back();</script>";
        }
    }
 }
?>
        
    

