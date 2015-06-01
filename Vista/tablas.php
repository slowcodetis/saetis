<?php

  include '../Modelo/conexion.php';
  include '../Controlador/ValidadorIntervaloFecha.php';
  
  session_start();
  $validador = new ValidadorFecha();
  $conect = new conexion();

  $fechap   = $_POST["fecha1"];


  $scriptExito = "<script>alert('Publicacion realizada con exito')</script>";

  if($validador->validarTiempoFecha($fechap)){
    $userAct = $_SESSION['usuario'];
    if(isset($_POST["enviar"])){
            $destino= $_POST["Conocido"];

            if($destino=="Publico")
            {
                $grupoE="PUBLICO";
                $titulo      = $_POST["campoTitulo"];
                $desDoc  = $_POST["campoDescripcion"];
                $fechap   = $_POST["fecha1"];

                $horap        = $_POST["hora1"];
                $rutap        = $_POST["recurso"];
                $eshora=strftime($horap).":00";
                $fecha       = date('Y-m-d');
                $hora        =  date("G:H:i");
                $visualizable="TRUE";
                $descargable="TRUE";  

                $comentario_add = $conect->consulta_publicaciones("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$userAct','publicaciones','Habilitado','$titulo','$fecha','$hora')");
                
                if($comentario_add){
                   $query= $conect->consulta("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
                   if ($row = mysql_fetch_row($query)) 
                   {
                       $idDoc = trim($row[0]);
                   }
     
                   $guardar_doc = $conect->consulta("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D)
                   VALUES('$idDoc','1024','$rutap','TRUE','TRUE')");
                   $des_D=$conect->consulta("INSERT INTO descripcion (ID_R,DESCRIPCION_D)
                   VALUES('$idDoc','$desDoc')");
                  $destinatario=$conect->consulta("INSERT INTO receptor (ID_R,RECEPTOR_R)
                  VALUES('$idDoc','$grupoE')");
                  $guardar = $conect->consulta("INSERT INTO periodo (ID_R,fecha_p,hora_p) VALUES ('$idDoc','$fechap','$horap')") or
                  die("Error al s");
                  
                  echo $scriptExito;
                  echo "<script>window.location = '../Vista/publicaciones.php' </script>";
                }
                else {
                  echo "<script>  window.history.back() </script>";
                }

            }

             if($destino=="Grupo Empresa")
            {
                $grupoEmp=$_POST["grupoempresa"];
                if($grupoEmp=="TODOS")
                {
                  $destinoG="Todas las Grupo Empresas";
                  $titulo      = $_POST["campoTitulo"];
                  $desDoc  = $_POST["campoDescripcion"];
                  $fechap   = $_POST["fecha1"];
                  $horap        = $_POST["hora1"];
                  $rutap        = $_POST["recurso"];
                  $eshora=strftime($horap).":00";
                  $fecha       = date('Y-m-d');
                  $hora        =  date("G:H:i");
                  $visualizable="TRUE";
                  $descargable="TRUE";  


                  $comentario_add = $conect->consulta_publicaciones("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$userAct','publicaciones','Habilitado','$titulo','$fecha','$hora')");


                  if($comentario_add){
                  $query= $conect->consulta("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
                  if ($row = mysql_fetch_row($query))  {
                   $idDoc = trim($row[0]);
                  }
 
                  $guardar_doc = $conect->consulta("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D)
                  VALUES('$idDoc','1024','$rutap','TRUE','TRUE')");
                  $des_D=$conect->consulta("INSERT INTO descripcion (ID_R,DESCRIPCION_D)
                  VALUES('$idDoc','$desDoc')");
                  $destinatario=$conect->consulta("INSERT INTO receptor (ID_R,RECEPTOR_R)
                  VALUES('$idDoc','$destinoG')");
                  $guardar = $conect->consulta("INSERT INTO periodo (ID_R,fecha_p,hora_p) VALUES ('$idDoc','$fechap','$horap')") or
                  die("Error al s");

                  echo $scriptExito;
                  echo "<script>window.location = '../Vista/publicaciones.php' </script>";
                }
                else {
                  echo "<script>  window.history.back() </script>";
                }
              
              }
              else{

                    if($grupoEmp=="Seleccione Grupo Empresa")
                    {
                           echo"<script type=\"text/javascript\">alert('No seleccion\u00f3  Grupo Empresa '); window.history.back();</script>";
                    }
                    else{

                      $destinoG="Todos los Proyectos";
                      $titulo      = $_POST["campoTitulo"];
                      $desDoc  = $_POST["campoDescripcion"];
                      $fechap   = $_POST["fecha1"];
                      $horap        = $_POST["hora1"];
                      $rutap        = $_POST["recurso"];
                      $eshora=strftime($horap).":00";
                      $fecha       = date('Y-m-d');
                      $hora        =  date("G:H:i");
                      $visualizable="TRUE";
                      $descargable="TRUE";  


                      $comentario_add = $conect->consulta_publicaciones("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$userAct','publicaciones','Habilitado','$titulo','$fecha','$hora')");
                      
                      if(!$comentario_add) {
                        $query= $conect->consulta("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
                        if ($row = mysql_fetch_row($query)) 
                        {
                            $idDoc = trim($row[0]);
                        }
   
                         $guardar_doc = $conect->consulta("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D)
                         VALUES('$idDoc','1024','$rutap','TRUE','TRUE')");
                        $des_D=$conect->consulta("INSERT INTO descripcion (ID_R,DESCRIPCION_D)
                        VALUES('$idDoc','$desDoc')");
                        $destinatario=$conect->consulta("INSERT INTO receptor (ID_R,RECEPTOR_R)
                        VALUES('$idDoc','$grupoEmp')");
                        $guardar = $conect->consulta("INSERT INTO periodo (ID_R,fecha_p,hora_p) VALUES ('$idDoc','$fechap','$horap')") or
                        die("Error al s");

                        echo $scriptExito;
                        echo "<script>window.location = '../Vista/publicaciones.php' </script>";
                      }
                      else {
                        echo "<script>  window.history.back() </script>";
                      }

                  }
                }

            }

              if($destino=="Proyectos")
            {
                $proyecto=$_POST["proyecto"];
                if($proyecto=="TODOS")
                {
                  $destinoG="Todos los Proyectos";
                  $titulo      = $_POST["campoTitulo"];
                  $desDoc  = $_POST["campoDescripcion"];
                  $fechap   = $_POST["fecha1"];
                  $horap        = $_POST["hora1"];
                  $rutap        = $_POST["recurso"];
                  $eshora=strftime($horap).":00";
                  $fecha       = date('Y-m-d');
                  $hora        =  date("G:H:i");
                  $visualizable="TRUE";
                  $descargable="TRUE";  


                $comentario_add = $conect->consulta_publicaciones("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$userAct','publicaciones','Habilitado','$titulo','$fecha','$hora')");
                
                if(!$comentario_add) {

                  $query= $conect->consulta("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
                  if ($row = mysql_fetch_row($query))  {
                    $idDoc = trim($row[0]);
                  }
 
                  $guardar_doc = $conect->consulta("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D)
                  VALUES('$idDoc','1024','$rutap','TRUE','TRUE')");
                  $des_D=$conect->consulta("INSERT INTO descripcion (ID_R,DESCRIPCION_D)
                  VALUES('$idDoc','$desDoc')");
                  $destinatario=$conect->consulta("INSERT INTO receptor (ID_R,RECEPTOR_R)
                  VALUES('$idDoc','$destinoG')");
                  $guardar = $conect->consulta("INSERT INTO periodo (ID_R,fecha_p,hora_p) VALUES ('$idDoc','$fechap','$horap')") or
                  die("Error al s");

                  echo $scriptExito;
                  echo "<script>window.location = '../Vista/publicaciones.php' </script>";
                }
                else {
                  echo "<script>  window.history.back() </script>";
                }
              
              }
              else{

                    if($proyecto=="Seleccione Proyecto") {
                           echo"<script type=\"text/javascript\">alert('No seleccion\u00f3 proyecto'); window.history.back();</script>";
                    }

                    else{
                      $destinoG="Todos los Proyectos";
                      $titulo      = $_POST["campoTitulo"];
                      $desDoc  = $_POST["campoDescripcion"];
                      $fechap   = $_POST["fecha1"];
                      $horap        = $_POST["hora1"];
                      $rutap        = $_POST["recurso"];
                      $eshora=strftime($horap).":00";
                      $fecha       = date('Y-m-d');
                      $hora        =  date("G:H:i");
                      $visualizable="TRUE";
                      $descargable="TRUE";  

                      $comentario_add = $conect->consulta_publicaciones("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$userAct','publicaciones','Habilitado','$titulo','$fecha','$hora')");
                      
                      if(!$comentario_add) {
                        $query= $conect->consulta("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
                        if ($row = mysql_fetch_row($query))  {
                            $idDoc = trim($row[0]);
                        }
 
                        $guardar_doc = $conect->consulta("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D)
                        VALUES('$idDoc','1024','$rutap','TRUE','TRUE')");
                        $des_D=$conect->consulta("INSERT INTO descripcion (ID_R,DESCRIPCION_D)
                        VALUES('$idDoc','$desDoc')");
                        $destinatario=$conect->consulta("INSERT INTO receptor (ID_R,RECEPTOR_R)
                        VALUES('$idDoc','$proyecto')");
                        $guardar = $conect->consulta("INSERT INTO periodo (ID_R,fecha_p,hora_p) VALUES ('$idDoc','$fechap','$horap')") or
                        die("Error al s");

                      echo $scriptExito;
                      echo "<script>window.location = '../Vista/publicaciones.php' </script>";
                    }
                    else {
                      echo "<script>  window.history.back() </script>";
                    }
                  }
                }
            }
    }
  }
  else {
    echo"<script type=\"text/javascript\">alert('La fecha introducida es anterior a la fecha actual, cambie de fecha'); window.location='../Vista/publicar_asesor.php';</script>";
  }          
?>