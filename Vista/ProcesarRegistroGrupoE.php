<?php

    $nombreUGE = $_POST['nombreU']; //nombre del Usuario
    $nombreLGE = $_POST['nombreL']; //nombre Largo
    $nombreCGE = $_POST['nombreC']; //nombre Corto
    $nombreRGE = "";
    $correoGE = $_POST['correo'];   //Correo
    $telefGE = $_POST['telefono'];  //Telefono grupo empresa
    $dirGE = $_POST['direccion'];   //Direccion grupo empresa
    $contGE = $_POST['contrasena1'];//contrasena
    
    include '../Modelo/conexion.php';
    require '../Vista/PHPMailerAutoload.php';
    require '../Vista/class.phpmailer.php';
    
    $conexion = new conexion();
    
    $seleccion = $conexion->consulta("SELECT NOMBRE_U FROM usuario WHERE NOMBRE_U = '$nombreUGE' ");
    $verGE = mysql_fetch_row($seleccion);
    
     if (!is_array($verGE)) 
     {

        $seleccion = $conexion->consulta("SELECT NOMBRE_CORTO_GE FROM grupo_empresa WHERE NOMBRE_CORTO_GE = '$nombreCGE' ");
        $verNC = mysql_fetch_row($seleccion);
         
        if(!is_array($verNC))
        {

            $seleccion = $conexion->consulta("SELECT NOMBRE_LARGO_GE FROM grupo_empresa WHERE NOMBRE_LARGO_GE = '$nombreLGE' ");
            $verNL = mysql_fetch_row($seleccion);
                 
             if(!is_array($verNL))
             {

                /*$db = 'tis_mbittle';
                $host = '192.168.2.5';
                $user = 'mbittle';
                $pass = '5rtZAGYq';*/
                
                $db = 'saetis';
                $host = 'localhost';
                $user = 'root';
                $pass = 'Crhyst23';

                try {
                  
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";

                    $conn = new PDO("mysql:host=$servername;dbname=saetis", $username, $password);

                  
                    //$conn = new PDO("mysql:dbname=".$db.";host=".$host,$user, $pass);
                    //$conn = new PDO("mysql:host=".$host.";dbname=".$db.'charset=latin1'.','.$user.','.$pass);
                    //echo 'sas';
                    //echo 'mysql:host=localhost;dbname=saetis;charset=latin1, root, root';
                    //$conn = new PDO('mysql:host=localhost;dbname=saetis;charset=latin1', 'root', 'root');

                } catch (Exception $e) {

                    echo $e -> getMessage();
                }

                //echo 'mysql:dbname='.$db.'";host="'.$host.','.$user.','. $pass;

                //$conn = new PDO("mysql:dbname=".$db.";host=".$host,$user, $pass);

                //echo 'hola como estas';
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // iniciar transacción
                 $conn->beginTransaction();


                echo 'la logra';
                try 
                {
                    $sql = 'INSERT INTO usuario (NOMBRE_U, ESTADO_E, PASSWORD_U, TELEFONO_U, CORREO_ELECTRONICO_U) VALUES (:value, :estado, :contrasena, :telefono, :correo);';
                    $result = $conn->prepare($sql);
                    $result->bindValue(':value', $nombreUGE, PDO::PARAM_STR);
                    $result->bindValue(':estado', 'Habilitado', PDO::PARAM_STR);
                    $result->bindValue(':contrasena', $contGE, PDO::PARAM_STR);
                    $result->bindValue(':telefono', $telefGE, PDO::PARAM_STR);
                    $result->bindValue(':correo', $correoGE, PDO::PARAM_STR);
                    $result->execute();
                    //$lastId = $conn->lastInsertId();
                    $sql = 'INSERT INTO grupo_empresa (NOMBRE_U, NOMBRE_CORTO_GE, NOMBRE_LARGO_GE, DIRECCION_GE, REPRESENTANTE_LEGAL_GE) VALUES (:a_id, :nombreC, :nombreL, :direccion, :representante)';
                    $result = $conn->prepare($sql);
                    $result->bindValue(':a_id', $nombreUGE, PDO::PARAM_STR);
                    $result->bindValue(':nombreC', $nombreCGE, PDO::PARAM_STR);
                    $result->bindValue(':nombreL', $nombreLGE, PDO::PARAM_STR);
                    $result->bindValue(':direccion', $dirGE, PDO::PARAM_STR);
                    $result->bindValue(':representante', $nombreRGE, PDO::PARAM_STR);
                    $result->execute();
                     $sql = 'INSERT INTO usuario_rol (NOMBRE_U, ROL_R) VALUES (:nombre, :rol)';
                    $result = $conn->prepare($sql);
                    $result->bindValue(':nombre', $nombreUGE, PDO::PARAM_STR);
                    $result->bindValue(':rol', 'grupoEmpresa', PDO::PARAM_STR);
                    $result->execute();

                    $conn->commit();
                    echo"<script type=\"text/javascript\">alert('El registro ha sido satisfactorio'); window.location='RegistrarGrupoEmpresa.php';</script>";

                } catch (PDOException $e) {
                    // si ocurre un error hacemos rollback para anular todos los insert
                    $conn->rollback();
                    echo $e->getMessage();
                }
             }
             else
             {                
                echo"<script type=\"text/javascript\">alert('El nombre largo ya esta registrado'); window.location='RegistrarGrupoEmpresa.php';</script>";
             }
             
         }
         else
         {
                echo"<script type=\"text/javascript\">alert('El nombre corto ya esta registrado'); window.location='RegistrarGrupoEmpresa.php';</script>";
         }
         
     }
     else
     {
        echo"<script type=\"text/javascript\">alert('El nombre de usuario ya esta registrado'); window.location='RegistrarGrupoEmpresa.php';</script>";
     }
    
?>
