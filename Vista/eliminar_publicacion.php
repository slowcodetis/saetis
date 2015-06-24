<?php
 
    session_start();
    include '../Modelo/conexion.php';
    $conect = new conexion();

    //Crear variables--------------------------
    $usuario = $_SESSION['usuario'];
    error_reporting(E_ALL ^ E_NOTICE);
    $idPubli = $_GET['id_us'];

    //conexion------------- 
    //Peticion
    $selRegis =$conect->consulta(" SELECT ID_R  FROM `registro` WHERE NOMBRE_R ='$idPubli'");
    $tamRegis=mysql_num_rows($selRegis);
    if($tamRegis>0) {
        $filaRegi = mysql_fetch_array($selRegis);
        $idRegis=$filaRegi[0];
        
        $delDes=$conect->consulta(" DELETE FROM `descripcion` WHERE ID_R='$idRegis'");
        $delDoc=$conect->consulta(" DELETE FROM `documento` WHERE ID_R='$idRegis'");
        $delPerio = $conect->consulta("DELETE FROM periodo WHERE ID_R = '$idRegis' ");
        $delPlazo = $conect->consulta("DELETE FROM plazo WHERE ID_R = '$idRegis' ");
        $delRecep = $conect->consulta("DELETE FROM receptor WHERE ID_R = '$idRegis' ");
        
        $queryDocumentosSolicitados = "SELECT REGISTRO_ID FROM documento_requerido_oc WHERE REGISTRO_ID_OC = $idRegis"; 
        $resultadoConsula = $conect->consulta($queryDocumentosSolicitados);
        $tamDocumentos=mysql_num_rows($resultadoConsula);
        if($tamDocumentos>0) {
            $filaRegistro = mysql_fetch_array($resultadoConsula);
            for($i = 0; $i < mysql_num_rows($resultadoConsula); $i++) {
                
                    echo "<script> </script>";

                $idRegistro = $filaRegistro[$i];
                $delDes = $conect->consulta(" DELETE FROM `descripcion` WHERE ID_R='$idRegistro'");
                $delDoc = $conect->consulta(" DELETE FROM `documento` WHERE ID_R='$idRegistro'");
                $delPerio = $conect->consulta("DELETE FROM periodo WHERE ID_R = '$idRegistro' ");
                $delPlazo = $conect->consulta("DELETE FROM plazo WHERE ID_R = '$idRegistro' ");
                $delRecepcion = $conect->consulta("DELETE FROM receptor WHERE ID_R = '$idRegistro' ");
                $delDocReqOC = $conect->consulta("DELETE FROM documento_requerido_oc WHERE REGISTRO_ID = '$idRegistro' ");
                $delRegistro = $conect->consulta("DELETE FROM registro WHERE ID_R = '$idRegistro' ");
            }
        }
        $delRegis= $conect->consulta("DELETE FROM registro WHERE ID_R = '$idRegis' ");
        
    //cerrar conexion--------------------------
    //volver a la pagina---------------
        echo '<script>alert("Se elimino el documento correctamente");</script>';
        echo '<script>window.location="../Vista/publicaciones.php";</script>';
    } 
?>