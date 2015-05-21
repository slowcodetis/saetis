<?php
session_start();
  
    include 'configDB.php';
    $nombreU = $_SESSION['usuario'];
    $nombreS = $_POST['nombre'];
    $apellidoS = $_POST['apellido'];
    
    include '../Modelo/conexion.php';
    $data_mysql = new datamysql();
    $conect = new conexion();
    $db = $this->data_mysql->getDB();
    $host = $this->data_mysql->getHos();
    $user = $this->data_mysql->getUs();
    $pass = $this->data_mysql->getPas();
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

            $sql = 'INSERT INTO socio (NOMBRE_U, NOMBRES_S, APELLIDOS_S) VALUES (:nombreU, :nombreS, :apellidoS);';

            $result = $conn->prepare($sql);

            $result->bindValue(':nombreU', $nombreU, PDO::PARAM_STR);
            $result->bindValue(':nombreS', $nombreS, PDO::PARAM_STR);
            $result->bindValue(':apellidoS', $apellidoS, PDO::PARAM_STR);

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
    ?>
