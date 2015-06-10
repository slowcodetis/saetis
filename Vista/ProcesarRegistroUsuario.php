<?php

    $Name = $_POST['nombreUsuario'];
    $RealName = $_POST['nombreReal'];
    $Pass = $_POST['password'];
    $Email = $_POST['email'];
    $rol = "asesor";
    $Apellido = $_POST['apellido'];
    $Telefono = $_POST['telefono'];

    $camposNoVacios = true;
    $camposNoVacios = $camposNoVacios && strlen(trim($Name)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($RealName)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($Pass)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($Email)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($rol)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($Apellido)) > 0;
    $camposNoVacios = $camposNoVacios && strlen(trim($Telefono)) > 0;

    include '../Modelo/conexion.php';
    require '../Vista/PHPMailerAutoload.php';
    require '../Vista/class.phpmailer.php';
    if ($camposNoVacios){
      $conect = new conexion();
      $mail = new PHPMailer();
      $Sel_U = $conect->consulta("SELECT NOMBRE_U FROM usuario WHERE NOMBRE_U = '$Name' ");
      $Sel_U2 = mysql_fetch_row($Sel_U);
       if (!is_array($Sel_U2)) {
             
            //Definir que vamos a usar SMTP
            $mail->IsSMTP();
            //Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
            // 0 = off (producción)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug  = 0;

            //Ahora definimos gmail como servidor que aloja nuestro SMTP
//            $mail->Host       = 'smtp.gmail.com';
            $mail->Host       = 'mx1.2freehosting.com';
            //$mail->Host = 'smtp-mail.outlook.com';
            //$mail->Host = 'smtp.live.com';
            //$mail->Host = 'smtp.mail.yahoo.com';

            //El puerto será el 587 ya que usamos encriptación TLS
            $mail->Port       = 2525;
            //$mail->Port       = 465;

            //Definmos la seguridad como TLS
//            $mail->SMTPSecure = 'tls';
            //Tenemos que usar gmail autenticados, así que esto a TRUE
            $mail->SMTPAuth   = true;
            
            //Definimos la cuenta que vamos a usar. Dirección completa de la misma
            //
            //$mail->Username   = "jhonny_h_crespo@yahoo.com";
//            $mail->Username   = "saetis.oficial@gmail.com";
            $mail->Username   = "saetis@saetis.3eeweb.com";
            
            //Introducimos nuestra contraseña de gmail
//            $mail->Password   = "saetis.oficial1";
            $mail->Password   = "1q2w3e4r.";
            //Definimos el remitente (dirección y, opcionalmente, nombre)
            //           $mail->SetFrom('saetis.oficial@gmail.com', 'Saetis');
            $mail->SetFrom('saetis@saetis.3eeweb.com', $UsuarioActivo);
            //Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
            //$mail->AddReplyTo('replyto@correoquesea.com','El de la réplica');
            //Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
            $mail->AddAddress('saetis@saetis.3eeweb.com', 'Administrador');
            //Definimos el tema del email
            $mail->Subject = 'Solicitud de Registro';
            //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
            //$mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
            $mail->MsgHTML('El usuario '.$Name.' desea registrarse en el sistema Saetis como '.$rol.'');
            //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
            $mail->AltBody = 'This is a plain-text message body';
            //Enviamos el correo
            if(!$mail->Send()) {
              echo "Error: " . $mail->ErrorInfo;
            } else {
              $conect->consulta("INSERT INTO usuario(NOMBRE_U, ESTADO_E, PASSWORD_U, TELEFONO_U, CORREO_ELECTRONICO_U) VALUES('$Name','Deshabilitado','$Pass','$Telefono','$Email')"); 

              $conect->consulta("INSERT INTO asesor(NOMBRE_U, NOMBRES_A, APELLIDOS_A) VALUES('$Name','$RealName','$Apellido')");  
              $conect->consulta("INSERT INTO usuario_rol(NOMBRE_U, ROL_R) VALUES('$Name','$rol')");  
              $conect->consulta("INSERT INTO criteriocalificacion(NOMBRE_U,NOMBRE_CRITERIO_C,TIPO_CRITERIO) VALUES('$Name','PUNTAJE','4')");
                 
              echo '<script>alert("Su solicitud se envio correctamente");</script>';
              echo '<script>window.location="RegistrarUsuario.php";</script>';
            }
        } else {
            echo '<script>alert("El nombre de usuario ya esta registrado");</script>';
            echo '<script>window.location="RegistrarUsuario.php";</script>';
        }

    } else {
        echo '<script>alert("Los campos no pueden estar vacios");</script>';
        echo '<script>window.history.back();</script>';
    }
   
?>
