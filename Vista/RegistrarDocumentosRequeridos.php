f<?php  

    include '../Modelo/conexion.php';
    $con = new conexion(); 
    session_start();
    $uActivo = $_SESSION['usuario'];

    include '../Modelo/validadorAcceso.php';
    $objValidador = new ControladorAccesoVistasPorUsuario(' ');
    $urlActual = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $objValidador->puedeAcceder($urlActual, $uActivo);


?> 
 <!DOCTYPE html>
 <html>

 <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Apoyo a la Empresa TIS</title>

    <!-- JQuery -->
    <script type="text/javascript" src="../Librerias/lib/jquery-2.1.0.min.js"></script>
    <script src="../Librerias/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../Librerias/lib/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <!-- icheck -->
    <link href="../Librerias/icheck/skins/square/green.css" rel="stylesheet">
    <script src="../Librerias/lib/icheck.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../Librerias/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../Librerias/lib/bootstrap.js"></script>
    <!-- Docs -->
    <link rel="stylesheet" type="text/css" href="../Librerias/lib/css/docs.css">
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="../Librerias/font-awesome/css/font-awesome.css">
    <!-- Bootstrap-datetimepicker -->
    <link rel="stylesheet" type="text/css" href="../Librerias/lib/css/bootstrap-datetimepicker.css">
    <script type="text/javascript" src="../Librerias/lib/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../Librerias/lib/bootstrap-datetimepicker.es.js"></script>
    <!-- Bootstrap-multiselect -->
    <link rel="stylesheet" type="text/css" href="../Librerias/lib/css/bootstrap-multiselect.css">
    <script type="text/javascript" src="../Librerias/lib/bootstrap-multiselect.js"></script>
    <!-- Bootstrap-validator -->
    <link rel="stylesheet" type="text/css" href="../Librerias/lib/css/bootstrapValidator.css">
    <script type="text/javascript" src="../Librerias/lib/bootstrapValidator.js"></script>
    <!-- Validators -->
    <script type="text/javascript" src="../Librerias/lib/validator/diferenteActividadPlanificacion.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/diferenteEntregable.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/stringLength.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/notEmpty.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/callback.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/date.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/numeric.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/porcentajeMax.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/porcentajeMin.js"></script>
    <!-- JS -->
    <script type="text/javascript" src="../Librerias/lib/funcion.js"></script>
    <script type="text/javascript" src="../Librerias/lib/funcionSeguimiento.js"></script>



    <script type="text/javascript" src="../Librerias/js/calendario_notacion_conformidad.js"></script>
    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
     <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
     <link href="../Librerias/lib/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
     <link href="../Librerias/lib/jquery-ui-1.11.4.custom/jquery-ui.theme.css" rel="stylesheet">
     <link href="../Librerias/lib/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
   
     <style>
        .menuScroll {
            overflow-y: scroll;
            max-height: 300px;
        }
    </style>

<script>
        $(function() {
            console.log('execute');
        $( "#fechaInicioE" ).datepicker({
          minDate: new Date(),

        changeMonth: true,
        dateFormat: "yy-mm-dd",        
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
        $( "#fechaFinalE" ).datepicker( "option","minDate" , selectedDate );
        }
        });
        $( "#fechaFinalE" ).datepicker({
            minDate: new Date(),
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: new Date(),
        onClose: function( selectedDate ) {
            minDate: new Date(),
        $( "#fechaInicioE" ).datepicker( "option", "maxDate", selectedDate );


        }
        });
        });
    </script>






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
            <a class="navbar-brand" href="inicio_asesor.php">Inicio </a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

                    <li>
                        <a data-toggle="modal" href="javascript:void('')" data-target="#myModal"><span class="glyphicon glyphicon-folder-open"></span>
                        Repositorio</a>
                    </li>

            <li>
                <a href="lista-de-noticias.php"><i class="glyphicon glyphicon-comment"></i> Foro</a>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php echo $uActivo.' '; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">

                    <li>
                        <a href="modificar_asesor.php"><i class="fa fa-user fa-fw"></i> Modificar Datos personales</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="unlog.php"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                    </li>
                </ul>
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse menuScroll">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="AdministrarGrupoEmpresa.php"><i class="glyphicon glyphicon-book"></i> Administrar Grupo Empresas</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-files-o "></i> Documentos <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../Vista/documentos_generados.php">Contratos Emitidos</a>
                            </li>
                            <li>
                                <a href="lista_doc_subidos.php">Documentos Subidos </a>  
                            </li>
                            <li>
                                <a href="documentos_recibidos.php">Documentos Recibidos</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-tasks fa-fw"></i> Tareas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="InscripcionProyecto.php">Registrar Proyecto</a>
                            </li>
                            <li>
                                <a href="../Vista/subirarchivoasesor.php">Subir Documentos</a>
                            </li>
                            <li>
                                <a href="../Vista/RegistrarDocumentosRequeridos.php">Registrar Documentos Requeridos</a>
                            </li>
                            
                            <li>
                                <a href="ConfiguracionFechasRecepcion.php" >Configurar Fechas para la Recepci&oacute;n de Documentos</a>
                            </li>
                            <li>
                                <a href="../Vista/publicar_asesor.php">Crear Publicaci&oacute;n </a>
                            </li>
                            <li>
                                <a href="ordenDeCambio.php">Emitir Orden de Cambio</a>
                            </li>
                            <li>
                                <a href="notificacion_conformidad.php">Emitir Notificaci&oacute;n de Conformidad</a>
                            </li>
                            <li>
                                <a href="contrato.php">Emitir Contrato </a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a id="SeguimientoSemanal" href="#"><i class="glyphicon glyphicon-list-alt"></i> Seguimiento Semanal</a>
                    </li>

                    <li>
                        <a href="#"><i class="glyphicon glyphicon-th-list"></i> Evaluacion<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="lista_evaluacion.php">Evaluacion 2 Fase </a>                             
                            </li>
                            <li>
                                <a href="#">Evaluacion 3 Fase <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="CrearModalidadEvaluacion.php">Criterio de Evaluaci&oacute;n </a>                             
                                    </li>

                                    <li>
                                        <a href="#">Criterio de Calificaci&oacute;n<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="CrearModalidadCalificacion.php"> Crear Criterio de Calificaci&oacute;n</a>
                                            </li>
                                            <li>
                                                <a href="EliminarCriterioCalificacion.php"> Eliminar Criterio de Calificaci&oacute;n</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#">Formulario de Evaluacion<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="CrearFormulario.php">Crear Formulario de Evaluacion</a>
                                            </li>
                                            <li>
                                                <a href="SeleccionarFormulario.php"> Habilitar Formulario de Evaluacion </a>   
                                            </li>
                                            <li>
                                                <a href="EliminarFormulario.php">Eliminar Formulario de Evaluacion</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="EvaluarGrupoEmpresa.php">Evaluar Grupo Empresa </a>   
                                    </li>                                    
                                    
                                </ul>    
                            </li>
                            <li>
                                <a href="../Vista/EvaluacionGeneral.php">Evaluacion Final </a>   
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../Vista/publicaciones.php"><i class="fa fa-book"></i> Publicaciones </a>
                    </li>
                </ul><!-- /#side-menu -->
            </div><!-- /.sidebar-collapse -->
        </div>
    </nav>    
<div class="modal fade modalRegistroAsistencia" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Asistencia</h4>
            </div>
            <div class="modal-body">
                
            </div>

        </div>
    </div>
</div>

<div class="modal fade modalRegistroReportes" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Reportes</h4>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade modalSeguimiento" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ver Seguimientos</h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="mainbar">
                <div class="article">
                    <h2 class="page-header" >Registrar Documentos Requeridos</h2>
                </div>
            </div>
        </br>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" id="configuracionFechas">
                        <div class="panel-body"> 
                            <form  method="POST" name="formulario" id="formulario" action="GuardarDocumento.php">
                                <p>
                                    <label class="default" >Escriba el nombre del documento requerido</label>
                                </p>
                                <div class="form-group">
                                   <input type="text" name="nombreDocumento" id="" class="form-control" pattern="^[a-zA-Z\s]*$" required>
                               </div>
                               <div class="form-group">
                                   <input type="text" name="DescripcionDocumento" id="" class="form-control" pattern="^[a-zA-Z\s]*$" placeholder="Descripcion" required>
                               </br>
                               <select name="proyecto" class="form-control">
                                <option>Seleccione un proyecto</option>
                                <?php
                                $idGE= $uActivo  ;

                                $Con_G = "SELECT id_g "
                                . "FROM gestion "
                                . "WHERE DATE (NOW()) > DATE(FECHA_INICIO_G) and DATE(NOW()) < DATE(FECHA_FIN_G)";

                                $Sel_G=$con->consulta($Con_G);

                                $Id_G=mysql_fetch_row($Sel_G);

                                $Id_G2=$Id_G[0];
                                
                                $c1="SELECT p.`NOMBRE_P` FROM `proyecto` AS `p`, `gestion` AS `g` WHERE p.`ID_G` = g.`ID_G` AND p.`ID_G` LIKE '".$Id_G2."'";
                                
                                $a1=$con->consulta($c1);
                                
                                while($v1 =  mysql_fetch_array($a1)){
                                    echo "<option>".$v1[0]."</option>";
                                }
                                echo "<input type='hidden' name='idGE' value='$idGE'>";
                                
                                ?>
                            </select><br>
                        </div> 
                        
                        <p>
                            <label for="fechaInicioG"></label>
                        </p>

                        <div class="row show-grid">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="default" for="fechaInicioG">Fecha Inicio de  Entrega</label>
                                    
                                    <div class="form-group">
                                        <label>
                                            <input id="fechaInicioE" class ="form-control" placeholder="AAAA-MM-DD" type="date" name="fechaInicioE" id="fechaInicioE" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$" required/ readonly>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="default">
                                 Hora Inicio de Entrega:<span id="sprytextfield1"></label>
                                 <div class="form-group">
                                    <label for="horaINICIO">
                                        <input id="horaInicio" class ="form-control" placeholder="HH:MM"  type="time" name="horaInicio" pattern ="^([0-1]?[0-9]|[2][0-3]):([0-5][0-9])(:[0-5][0-9])?$" required/>
                                    </label>
                                </div>
                            </div>
                            
                        </div> 
                        
                        
                        <div class="row show-grid">
                          <div class="col-md-6">
                              <label class="default" for="fecha">Fecha Final de Entrega</label>
                              <div class="form-group">
                                <label>
                                    <input id="fechaFinalE" class ="form-control" placeholder="AAAA-MM-DD"  type="date" name="fechaFinalE"  required/ readonly>
                                </label>
                            </div>
                            

                        </div>

                        <div class="col-md-6">
                            <label class="default">
                                Hora Final de Entrega :<td><span id="sprytextfield1"></label>
                                <div class="form-group">
                                    <label for="horaLimite">
                                        <input id="horafinal" class ="form-control"  placeholder="HH:MM" type="time"  name="horaFinal"  pattern="^([0-1]?[0-9]|[2][0-3]):([0-5][0-9])(:[0-5][0-9])?$" required/>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <p>
                          <input type="submit" class="btn btn-primary" name="aceptarFecha" id="aceptarFecha" value="Aceptar"/>
                          
                          <input type="reset"class="btn btn-default" name="btnVover2" id="btnVover2" value="Limpiar Formulario" />
                      </p>
                  </form>          
              </div><!-- /.panel body-->
          </div><!-- /.panel -->
      </div><!-- /.col-lg-12 -->
  </div><!-- /.row-->
</div>
</div><!-- /.row -->

                <div style="display: none;" aria-hidden="true" class="modal fade" id="myModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" style="width:920px;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Buscador</h4>
                                        </div>
                                        <div class="modal-body" style="padding:0px; margin:0px; width: 560px;">
                                            <iframe src="../Librerias/filemanager/dialogo.php?type=0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; " frameborder="0" height="500" width="896"></iframe>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal --> 



</div><!-- /#page-wrapper -->

</div>

<script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../Librerias/js/sb-admin.js"></script>
</body>

</html>
