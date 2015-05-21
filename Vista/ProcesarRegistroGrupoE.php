<?php
    
    $camposNoVacios = true;

    $nombreUGE = $_POST['nombreU']; //nombre del Usuario
    $nombreLGE = $_POST['nombreL']; //nombre Largo
    $nombreCGE = $_POST['nombreC']; //nombre Corto
    $nombreRGE = "";
    $correoGE = $_POST['correo'];   //Correo
    $telefGE = $_POST['telefono'];  //Telefono grupo empresa
    $dirGE = $_POST['direccion'];   //Direccion grupo empresa
    $contGE = $_POST['contrasena1'];//contrasena
    

    $camposNoVacios = $camposNoVacios && strlen(trim($nombreUGE)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($nombreLGE)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($nombreCGE)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($correoGE)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($telefGE)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($dirGE)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($contGE)) > 0;

    include '../Modelo/conexion.php';
    require '../Vista/PHPMailerAutoload.php';
    require '../Vista/class.phpmailer.php';
    require_once 'configDB.php';
    $data_mysql = new datamysql();
    
    if($camposNoVacios) {

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
                    $db = $this->data_mysql->getDB();
                    $host = $this->data_mysql->getHos();
                    $user = $this->data_mysql->getUs();
                    $pass = $this->data_mysql->getPas;

                    try {
                      
                        $servername = $this->data_mysql->getHos();
                        $username = $this->data_mysql->getUs();
                        $password = $this->data_mysql->getPas();
                        $databas = $this->data_mysql->getDB();

                        $conn = new PDO("mysql:host=$servername;dbname=$databas", $username, $password);

                    } catch (Exception $e) {

                        echo $e -> getMessage();
                    }
                    
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // iniciar transacción
                    $conn->beginTransaction();

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
                else {                
                    echo"<script type=\"text/javascript\">alert('El nombre largo ya esta registrado'); window.location='RegistrarGrupoEmpresa.php';</script>";
                }
            }
            else {
                echo"<script type=\"text/javascript\">alert('El nombre corto ya esta registrado'); window.location='RegistrarGrupoEmpresa.php';</script>";
            }
        }
        else {
            echo"<script type=\"text/javascript\">alert('El nombre de usuario ya esta registrado'); window.location='RegistrarGrupoEmpresa.php';</script>";
        }
    }
    else {
        echo"<script type=\"text/javascript\">alert('Los campos no pueden estar vacios'); window.location='RegistrarGrupoEmpresa.php';</script>";
    } 
?>
