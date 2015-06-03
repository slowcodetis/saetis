<?php
session_start();
  
include_once 'configDB.php';
include '../Controlador/filtroXSS.php';
    $nombreU = $_SESSION['usuario'];
    $nombS = mysql_escape_string($_POST['nombre']);
    $apellS = mysql_escape_string($_POST['apellido']);
    $nombreS = filterXSS($nombS);
    $apellidoS = filterXSS($apellS);
   
    include '../Modelo/conexion.php';
    $data_mysql = new datosmysql();
    $conect = new conexion();
    $seleccion="SELECT id_g "
                    . "FROM gestion "
                    . "WHERE DATE (NOW()) > DATE(FECHA_INICIO_G) and DATE(NOW()) < DATE(FECHA_FIN_G)";
    $consulta=$conect->consulta($seleccion);
    $idGestion=mysql_fetch_row($consulta);
    $idGestion_= $idGestion[0];

    $controlPorGestion= "SELECT count(*) " 
                       ."FROM socio "
                       ."WHERE NOMBRES_S = '$nombS' AND APELLIDOS_S= '$apellS' AND GESTION= $idGestion_";
    $control = $conect->consulta($controlPorGestion);
    $registroValido = mysql_fetch_row($control);
    $rValido = $registroValido[0];
    if($rValido == 0){

        $db = $data_mysql->getDB();
        $host = $data_mysql->getHos();
        $user = $data_mysql->getUs();
        $pass = $data_mysql->getPas();
        $conn = new PDO("mysql:dbname=".$db.";host=".$host,$user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // iniciar transacción
        $sqlControl = "SELECT count(*) FROM socio WHERE NOMBRE_U= '$nombreU'";
        //$valido = $validador -> fetchAll();
        foreach ($conn -> query($sqlControl) as $valor) {
            $cantidad = $valor[0];   
        }
            
            //echo"<script type=\"text/javascript\">alert('bark '); window.location='AnadirSocio.php';</script>";
            if($cantidad < 5) {
            //SELECT count(*) FROM `socio` WHERE `NOMBRE_U` = 'FreeValue' 
            $conn->beginTransaction();
            try {

                $sql = 'INSERT INTO socio (NOMBRE_U, NOMBRES_S, APELLIDOS_S, GESTION) VALUES (:nombreU, :nombreS, :apellidoS, :idGestion_);';

                $result = $conn->prepare($sql);

                $result->bindValue(':nombreU', $nombreU, PDO::PARAM_STR);
                $result->bindValue(':nombreS', $nombreS, PDO::PARAM_STR);
                $result->bindValue(':apellidoS', $apellidoS, PDO::PARAM_STR);
                $result->bindValue(':idGestion_', $idGestion_, PDO::PARAM_STR);

                $result->execute();


                $conn->commit();
                echo"<script type=\"text/javascript\">alert('El registro ha sido satisfactorio'); window.location='AnadirSocio.php';</script>";
            } catch (PDOException $e) {
               // si ocurre un error hacemos rollback para anular todos los insert
                $conn->rollback();
                echo $e->getMessage();
            }
            } else {
                echo"<script type=\"text/javascript\">alert('El registro no fue realizado debido a que la empresa tiene el maximo numero de socios registrados'); window.location='AnadirSocio.php';</script>";
            } 
    } else {
        echo"<script type=\"text/javascript\">alert('El socio que intenta registrar ya se encuentra registrado en una grupo empresa para la presente gestion'); window.history.back();</script>";
    } 
    ?>
