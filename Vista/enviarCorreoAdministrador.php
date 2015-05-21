
<?php 
    session_start();
    $uActivo = $_SESSION['usuario'];
    include '../Modelo/conexion.php';
    //Impide ingresar a vistas que no son validas para un tipo de usuario
    //redireccionando la vist principal de usuario o en su defecto index.php
    
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
    <link rel="stylesheet" type="text/css" href="../Librerias/lib/css/docs.css">
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
                        <?php echo $uActivo.' '; ?><i class="fa fa-user fa-fw"></i>  
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="modificar_administrador.php">
                                <i class="fa fa-user fa-fw"></i> Modificar Datos personales
                            </a>
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
                                <a href="#"><i class="fa fa-tasks fa-fw"></i> Gestion de usuarios
                                    <span class="fa arrow"></span>
                                </a>
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
                                        <a href="add_roles.php">Añadir  Roles</a>
                                    </li>
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
                                <a href="#"><i class="fa fa-building-o fa-fw"></i>Enviar mensaje 
                                    <span class="fa arrow"></span>
                                </a>
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
                        <div class="article">
                            <div class="row">
                                <div class="col-lg-12"></div>
                                
                                <h2><span>Enviar Email</span></h2>	
                                <div id="contenido">
                                    <form action="generadorMensajeAdministrador.php" method="post">
                                        <left>
                                        <table border=0 width=65%>
                                            <tr>
                                                <td >
                                                    <p style="text-align:left;"  ></p><br>
                                                </td>
                                                <td>
                                                    
                                            		<?php 
                                                        $textoHTML = '<div class="form-group has-feedback">
                                                                            <div class="col-md-6">
                                                                                <div class="btn-group open">
                                                                                <button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Seleccionar..." style="width: 300px;">Seleccione los destinatario(s) <b class="caret"></b></button>
                                                                                <ul class="multiselect-container dropdown-menu">';
                                                        $listaItems = "";
                                                        $sql=$conectar->consulta("SELECT u.NOMBRE_U from usuario as u");
                                                		while($row=mysql_fetch_array($sql)) {
                                                            $listaItems = $listaItems. "<li> <a href=\"javascript:void(0);\"> <label class=\"checkbox\"><input type=\"checkbox\" name=\"multiselect[]\" value=\"".$row["NOMBRE_U"]."\">" .$row["NOMBRE_U"]."</label> </a> </li>";
                                                        }
                                                        $textoHTML = $textoHTML . $listaItems . '</ul>
                                                                        </div> <i class="form-control-feedback" data-bv-icon-for="entregables" style="display: none;"></i>                                      
                                                                        <small class="help-block" data-bv-validator="callback" data-bv-for="entregables" data-bv-result="NOT_VALIDATED" style="display: none;">Los entregables es un dato requerido, seleccione al menos uno</small>
                                                                    </div>
                                                                </div>';
                                                        echo $textoHTML;
                                                    ?>
                                        		</td>
                                            </tr>
                                            <td >
                                                <p style="text-align:left;" ></p>
                                            </td>
                                            <td>                                                                              
<<<<<<< HEAD
                                                                                                                                         
=======
                                            



                                                                                                                                       
>>>>>>> f76a9a764f3e7111c83fcb95fb44aa5457f15bde
                                            </td>
                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-envelope"></span>
                                                            </span>
                                                            <input class="form-control" type="text" name="asunto" size=10% id="UserEmail" placeholder="Asunto"  required>
                                                        </div>
                                                    </div>                                              
                                    		  </td>
                                    		</tr>
                                    		<tr>
                                                <td>
                                                    <p style="text-align:left;"></p><br><br><br><br><br><br><br>
                                                </td>
                                                <td>
                                                    <textarea name='area_info' class="form-control" cols='50' rows='8'>Escriba un mensjae Aqui</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                </td>
                                                <td>  <br>
                                                    <div class="form-group">
                                                        <button type="submit" name="submit" class="btn btn-primary" id="btn-registrarUser"> 
                                                            <span class="glyphicon glyphicon-ok"></span> Enviar Email
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        </center>
                                    </form>
                                </div>
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
