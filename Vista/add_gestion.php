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
    <script type="text/javascript" src="../Librerias/lib/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../Librerias/lib/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    
    <!-- Bootstrap-datetimepicker -->
    <link rel="stylesheet" type="text/css" href="../Librerias/lib/css/bootstrap-datetimepicker.css">
    <script type="text/javascript" src="../Librerias/lib/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../Librerias/lib/bootstrap-datetimepicker.es.js"></script>


    <!-- icheck -->
    <!-- Core CSS - Include with every page -->
    <link href="../Librerias/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Librerias/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="../Librerias/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
     <link href="../Librerias/lib/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
     <link href="../Librerias/lib/jquery-ui-1.11.4.custom/jquery-ui.theme.css" rel="stylesheet">
     <link href="../Librerias/lib/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
   

    <!-- SB Admin CSS - Include with every page -->
    <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/tabla-div.css" rel="stylesheet" type="text/css" />


    <script type="text/javascript" src="../Librerias/js/calendario_notacion_conformidad.js"></script>
    
    <script>

        jQuery(document).ready(function() {
            console.log("hsdfjksdhfjks");
    
            $(".verificar").on("click", function(e) {

                return confirm('Esta seguro que quiere eliminar la gestion?');

            });
        });

    </script>
    <script>
        $(function() {
            console.log('execute');
        $( "#from" ).datepicker({
          minDate: new Date(),

        changeMonth: true,
        dateFormat: "yy-mm-dd",        
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option","minDate" , selectedDate );
        }
        });
        $( "#to" ).datepicker({
            minDate: new Date(),
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: new Date(),
        onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );


        }
        });
        });
    </script>



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
        <div class="article">
                <div class="row">
                <div class="col-lg-12"></div>
                <h2><span>Nueva Gestion</span></h2>

        <form action='crear_gestion.php' method='POST'>
                                    
                <table>
                <tr>
                <td>
        <div class="contenedor-columna">
        <p style="text-align:right;">Fecha Inicio :</p>
        </div>
        <div class="contenedor-columna">
                    <input id="from" type='date' class="form-control" required name='ini'  placeholder="AAAA-MM-DD" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" readonly>
        </div>
                </td> 
                </tr>  <tr>
                 <td>
        <div class="contenedor-columna">
        <p style="text-align:right;">Fecha Fin :</p>
        </div>
        <div class="contenedor-columna">
                    <input id="to" type='date' class="form-control" required name='fin' placeholder="AAAA-MM-DD" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" readonly>
                </div>
                </td> 
                </tr>
                                                                              
                                                                                  
        <tr>
                <td>    
                                        
        <div class="contenedor-columna">                                                                            
        <p style="text-align:right;">Gestion :</p>
        </div>
        <div class="contenedor-columna">
        <input type='text' size=16%  class="form-control" required name='rol' >
        </div> 
                </td> 
                                                                            
                <td>  
        <div class="contenedor-columna">
                <button type="submit"  class="btn btn-primary" align="middle" id="btn-registrarUser"> <span class="glyphicon glyphicon-ok"></span> Crear gestion</button>
        </div>
                </td> 
                </tr>
                                                                                
                                                                            
                                                                            
         </table>   
                                    
        </form>
        <h2><span>Listado Gestiones</span></h2>
        <div class="contenedor-fila2">
        <div class="contenedor-columna">
        <?php
        echo "Gestion";
        ?>
        </div>
        </div>
        <?php
        $peticion = $conectar->consulta("SELECT * FROM `gestion`");
            while($fila = mysql_fetch_array($peticion))
            {
            ?>
            <div class="contenedor-fila">
            <div class="contenedor-columna">
            <?php
            echo $fila['ID_G'];
            ?>
            </div>
            <div class="contenedor-columna">
            <?php
            echo $fila['NOM_G'];
            ?>
            </div>          
            <div class="contenedor-columna">
            <?php
            echo $fila['FECHA_INICIO_G'];
            ?>
            </div>
            <div class="contenedor-columna">
            <?php
            echo $fila['FECHA_FIN_G'];
            ?>
            </div>                                                                    
            <div class="contenedor-columna">
            <?php
            echo "<a href ='eliminar_gestion.php?id_us=".$fila['ID_G']."' class='verificar'><font color='blue'>Eliminar</font></a>";
            ?>
            </div>
                                    
            </div>
            <?php
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
