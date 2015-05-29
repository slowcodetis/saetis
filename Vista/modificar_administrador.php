 <?php  
    session_start();
    $uActivo = $_SESSION['usuario'];
    include '../Modelo/conexion.php';

    //Impide ingresar a vistas que no son validas para un tipo de usuario
    //redireccionando al index.php

    include '../Modelo/validadorAcceso.php';
    $objValidador = new ControladorAccesoVistasPorUsuario(' ');
    $urlActual = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $objValidador->puedeAcceder($urlActual, $uActivo);

    $conectar = new conexion();
    
 ?> 


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Apoyo a la Empresa TIS</title>

    <!-- Core CSS - Include with every page -->
    <link href="../Librerias/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Librerias/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="../Librerias/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
   

    <!-- SB Admin CSS - Include with every page -->
    <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    


</head>

<body>

   
    <div id="wrapper">
       
        
		<!--<h2>design by <a href="#" title="flash templates">flash-templates-today.com</a></h2>-->
        
	
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <a class="navbar-brand" href="principal.php">Inicio </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $uActivo.' '; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
  
                        <li><a href="modificar_administrador.php"><i class="fa fa-user fa-fw"></i> Modificar Datos personales</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="unlog.php"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            
    
       
             
                  
                
         
           <div class="sidebar-collapse">      
                      
                  
             <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        
                                <li>
                                    <a href="../Vista/registro_administrador.php"><i class="fa fa-bar-chart-o fa-files-o "></i> Nueva Cuenta<span class="fa arrow"></span></a>
                                </li>                        
                        
                         <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i> Gestion de usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="lista_usuarios.php">Usuarios Registrados</a>
                                </li>
                                <li>
                                    <a href="asignar_permisos.php">Modificar Permisos Usuarios</a>
                                </li>

                                <li>
                                    <a href="#">Grupo Empresa <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="lista_grupoEmpresa.php"> Integrantes </a>
                                            
                                        </li>
                                        <li>
                                            <a href="ListaGrupoEmpresas.php"> Lista de Grupo Empresas </a>
                                            
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                 <li>
                                    <a href="#">Administrador <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="lista_administradores.php"> Lista de Administadores </a>
                                            
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                 <li>
                                    <a href="#">Asesor <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="lista_asesores.php"> Lista de Asesores </a>
                                            
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i>Tareas <span class="fa arrow"></span></a>
                                 <ul class="nav nav-third-level">
                                    <li>
                                         <a href="add_gestion.php">Añadir  Gestion</a>
                                    </li>
  
                                </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i>Bitacora de ingresos <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                        <li>
                                            <a href="bitacora_ingreso.php">Registro</a>
                                            
                                        </li>

  
                                    </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i>Enviar mensaje <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                        <li>
                                            <a href="enviar_mail.php">Enviar Mensaje Habilitacion</a>
                                        </li>
                                        <li>
                                            <a href="enviarCorreoAdministrador.php">Enviar Mensaje</a>
                                        </li>
                                    </ul>
                            <!-- /.nav-second-level -->
                        </li>                       
                        

                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
                    
                    
         </div>
         
        
    </nav>           
                
                
            <div id="page-wrapper">
            <div class="row">
            <div class="col-lg-12">

            <div class="mainbar">
            <div class="article"><br><br>




            <h2><span>Modificar Informacion Personal</span></h2>
            <div id="contenido">
            <?php




            $usuario= $_SESSION['usuario'];
            $contrasena= $_SESSION['contrasena'];





            //Peticion
            $peticion =$conectar->consulta("SELECT u.NOMBRE_U,u.PASSWORD_U,u.TELEFONO_U,u.CORREO_ELECTRONICO_U,a.NOMBRES_AD,a.APELLIDOS_AD FROM  usuario u, administrador a WHERE u.NOMBRE_U=a.NOMBRE_U  and u.NOMBRE_U='$usuario'");
            //cerrar conexion--------------------------

            while($fila = mysql_fetch_array($peticion))
            {

            echo"
            <form action='actualizar_integrante.php' method='post'>
            <table border=0 width=50%>
            <tr>
            <td >

            </td>
            <td>

            <div class='form-group'>
            <div class='input-group'>
            <span class='input-group-addon'>
            <span class='glyphicon glyphicon-user'></span>
            </span>
            <input class='form-control' type='text' name='login' id='UserName'  value='".$fila['NOMBRE_U']."' readonly='readonly' required/>
            </div>
            </div>
            </td>
            </tr>
            <tr>
            <td >


            </td>
            <td>
            <div class='form-group'>
            <div class='input-group'>
            <span class='input-group-addon'>
            <span class='glyphicon glyphicon-lock'></span>
            </span>
            <input class='form-control' type='text' name='password' id='UserPassword'    minlength='5' pattern='^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$' title='la contraseña debe contener mayusculas, minusculas, caracteres y numeros' value='".$fila['PASSWORD_U']."' required/>
            </div>
            </div>  


            </td>
            </tr
            <tr>
            <td >

            </td>
            <td>
            <div class='form-group'>
            <div class='input-group'>
            <span class='input-group-addon'>
            <span class='glyphicon glyphicon-user'></span>
            </span>
            <input class='form-control' type='text' name='nombre' id='RealName' placeholder='Nombre' pattern='\b[A-Z]{1}[a-z]{2,20}' title='Ejm: Alejandra, Ivan, Ana'	 value='".$fila['NOMBRES_AD']."' required />
            </div>
            </div>                                                                                                



            </td>
            </tr>
            <tr>
            <td >

            </td>
            <td>
            <div class='form-group'>
            <div class='input-group'>
            <span class='input-group-addon'>
            <span class='glyphicon glyphicon-user'></span>
            </span>
            <input class='form-control' type='text' name='apellido' id='LastName' placeholder='Apellido' pattern='\b[A-Z]{1}[a-z]{3,20}\b' title='Ejm: Vargas, Morales, Medrano' value='".$fila['APELLIDOS_AD']."' required>
            </div>
            </div>                                                                                                

            </td>
            </tr>
            <tr>
            <td>

            </td>
            <td>
            <div class='form-group'>
            <div class='input-group'>
            <span class='input-group-addon'>
            <span class='glyphicon glyphicon-earphone'></span>
            </span>
            <input class='form-control' type='text' name='telefono' id='UserPhone' placeholder='Telefono' title='Ejm: 4022371' pattern='\b[4][0-9]{6}' value='".$fila['TELEFONO_U']."' required/>
            </div>
            </div>                                                                                               

            </td>
            </tr>
            <tr>
            <td>

            </td>
            <td >

            <div class='form-group'>
            <div class='input-group'>
            <span class='input-group-addon'>
            <span class='glyphicon glyphicon-envelope'></span>
            </span>
            <input class='form-control' type='email' name='email' id='UserEmail' placeholder='Correo' pattern='^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$' value='".$fila['CORREO_ELECTRONICO_U']."' required/>
            </div>
            </div>


            </td>
            </tr>

            <tr>
            <td>
            </td>
            <td>

            <div class='form-group'>
            <button type='submit'  class='btn btn-primary' id='btn-registrarUser'> <span class='glyphicon glyphicon-ok'></span> Actualizar</button>
            </div>


            </td>
            </tr>
            </table>
            </center>
            </form>
            ";
            }

            ?>

            </div>

            </div>

            </div>                   


            </div>
            <!-- /.col-lg-12 -->
            </div>

            </div>
            <!-- /#page-wrapper -->

            </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="../Librerias/js/jquery-1.10.2.js"></script>
    <script src="../Librerias/js/bootstrap.min.js"></script>
    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="../Librerias/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="../Librerias/js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../Librerias/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="../Librerias/js/demo/dashboard-demo.js"></script>

</body>

</html>
