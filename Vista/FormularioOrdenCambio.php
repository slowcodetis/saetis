<?php  
include '../Modelo/conexion.php';
include '../Modelo/validadorAcceso.php';
    session_start();
    $uActivo = $_SESSION['usuario'];
    $con=new conexion();

        $nEmpresa=$_POST['lista'];

    $consulta = "SELECT gestion.FECHA_FIN_G FROM grupo_empresa, gestion, proyecto, inscripcion_proyecto WHERE proyecto.CODIGO_P = inscripcion_proyecto.CODIGO_P AND inscripcion_proyecto.NOMBRE_U = grupo_empresa.NOMBRE_U AND grupo_empresa.NOMBRE_LARGO_GE = '$nEmpresa' AND gestion.ID_G = proyecto.ID_G";
    $stmt= $con->consulta($consulta);
    $fechaFinGestion =  mysql_fetch_array($stmt);
    $fechaFinGestion = str_replace("-", "/", $fechaFinGestion[0]);


    $_SESSION['nombreEmpresa'] = $nEmpresa;
         
/*
    $objValidador = new ControladorAccesoVistasPorUsuario(' ');
    $urlActual = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $objValidador->puedeAcceder($urlActual, $uActivo);
*/

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

    <!--DateTime Picker-->
    <!--script type="text/javascript" src="../Librerias/js/calendario_notacion_conformidad.js"></script-->
    <script type="text/javascript">
        $(document).on('ready',function(){
            $('#fecha').datetimepicker({

                yearOffset:0,
                lang:'es',
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y/m/d',
                minDate:'-1970/01/01', // fecha actual es el minimo de seleccion en fechas
                maxDate:  <?php echo "'$fechaFinGestion'";?>//'2015/06/30' 
                //maxDate:'+1970/04/01' // and tommorow is maximum date calendar
            });

            $('#hora').datetimepicker({
                datepicker:false,
                format:'H:i',
                step:5

            });
            $('#fecha2').datetimepicker({
                    yearOffset:0,
                    lang:'es',
                    timepicker:false,
                    format:'Y-m-d',
                    formatDate:'Y/m/d',
                    minDate: new Date() // fecha actual es el minimo de seleccion en fechas
                    // and tommorow is maximum date calendar
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="../Librerias/calendario2/jquery.datetimepicker.css"/>
    <script type="text/javascript" src="../Librerias/calendario2/jquery.datetimepicker.js"></script>

    <style>
        .menuScroll {
            overflow-y: scroll;
            max-height: 300px;
        }
    </style>

    <script type="text/javascript" src="../Librerias/js/validar_orden.js"></script>
    

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
                                    <a href="Adenda.php">Emitir Adenda </a>
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
            <form id = "ordenc" method = "post" action="" role="form" enctype="multipart/data-form" onsubmit="return validarCampos(ordenc)">
                <div class ="form-horizontal">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">Emitir Orden de Cambio</h2>    
                            </br>     
                        </div>
                    </div><!-- /.row -->
                    <!--Descripcion de la publicacion-->                 
                      <!--Campo de descripcion-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Puntuacion</label>
                        <div class="col-sm-8">
                            <table class="table form-group ">                                                          
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Descripción</th>
                                        <th>Puntaje Referencial</th>
                                        <th>Puntaje Obtenido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Cumplimiento de especificaciones del proponente</td>
                                        <td>15 puntos</td>
                                        <td> 
                                            <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[1]" id="textfield1" onkeypress="return validarNumeros(event)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Claridad en la organizaci&oacute;n de la empresa proponente</td>
                                        <td>10 puntos</td>
                                        <td>
                                            <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[2]" id="textfield2" onkeypress="return validarNumeros(event)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Cumplimiento de especificaciones t&eacute;cnicas</td>
                                        <td>30 puntos</td>
                                        <td>
                                            <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[3]" id="textfield3" onkeypress="return validarNumeros(event)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Claridad en el proceso de desarrollo</td>
                                        <td>10 puntos</td>
                                        <td>
                                            <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[4]" id="textfield4" onkeypress="return validarNumeros(event)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Plazo de Ejecuci&oacute;n</td>
                                        <td>10 puntos</td>
                                        <td>
                                            <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[5]" id="textfield5" onkeypress="return validarNumeros(event)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Precio total</td>
                                        <td>15 puntos</td>
                                        <td>
                                            <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[6]" id="textfield6" onkeypress="return validarNumeros(event)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Uso de herramientas en el proceso de desarrollo</td>
                                        <td>10 puntos</td>
                                        <td>
                                            <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[7]" id="textfield7" onkeypress="return validarNumeros(event)">
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                    </div><!--end/campoDescripcion-->

                    <div class="form-group">
                        <label class="col-xs-2 control-label">Fecha de la reuni&oacute;n:</label>
                        <div class="col-sm-1">
                            <input class="form-control" style="width:500px;heigth:30px;" placeholder = "AAAA-MM-DD" name="fecha" id="fecha" readonly  >
                        </div>
                    </div><!--end/fecha-->
                    
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Hora de la reuni&oacute;n:</label>
                        <div class="col-sm-1" >
                            <input class="form-control" style="width:500px;heigth:30px;"  name="hora" id="hora"  placeholder="HH:MM" readonly="readonly">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Lugar de la reuni&oacute;n:</label>
                        <div class="col-sm-2" >
                            <input class="form-control" style="width:500px;heigth:30px;"  name="lugar">
                        </div>
                    </div><!--end/lugar-->

                    <div class="form-group">
                        <label class="col-xs-2 control-label">Documentos que debe modificar: </label><br>
                        
                        <?php

                            $nEmpresa=$_POST['lista'];

                            $textoHTML = '<div class="form-group has-feedback">
                                                <div class="col-md-6">
                                                    <div class="btn-group open">
                                                    <button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Seleccionar..." style="width: 300px;">Seleccione los documento(s) <b class="caret"></b></button>
                                                    <ul class="multiselect-container dropdown-menu" style="max-height:200px;width:300px;overflow: auto;">';
                            $listaItems = "";
                            
                            $consulta = "SELECT NOMBRE_R FROM registro, documento_r, inscripcion, grupo_empresa, inscripcion_proyecto WHERE inscripcion_proyecto.CODIGO_P = documento_r.CODIGO_P AND documento_r.ID_R = registro.ID_R AND inscripcion_proyecto.NOMBRE_U = grupo_empresa.NOMBRE_U AND grupo_empresa.NOMBRE_LARGO_GE ='$nEmpresa' AND inscripcion.NOMBRE_UGE = inscripcion_proyecto.NOMBRE_U";
                            $stmt= $con->consulta($consulta);
                            
                            while($row=mysql_fetch_array($stmt)) {
                                $listaItems = $listaItems. "<li> <a href=\"javascript:void(0);\"> <label class=\"checkbox\"><input type=\"checkbox\" name=\"documentos[]\" value=\"".$row["NOMBRE_R"]."\">" .$row["NOMBRE_R"]."</label> </a> </li>";
                            }
                            $textoHTML = $textoHTML . $listaItems . '</ul>
                                            </div> <i class="form-control-feedback" data-bv-icon-for="entregables" style="display: none;"></i>                                      
                                            <small class="help-block" data-bv-validator="callback" data-bv-for="entregables" data-bv-result="NOT_VALIDATED" style="display: none;">Los entregables es un dato requerido, seleccione al menos uno</small>
                                        </div>
                                    </div>';
                            echo $textoHTML;
                        ?>
                    </div><!--end/docuemtnos a modificar-->

                    <div class="form-group" >
                        <label class="col-sm-2 control-label">Observaciones</label>
                        <a onclick="agregarHijo()" class="link-dos" > Agregar Observacion&nbsp;&nbsp;</a><span class="glyphicon glyphicon-plus"></span>
                        <a onclick="quitarHijo()" class="link-dos" > Quitar Observacion&nbsp;&nbsp;</a> <span class="glyphicon glyphicon-minus"></span>                     
                        <div id = "observaciones" style="height: 200px;width:600px;overflow-y: auto">
                        </div>
                    </div><!--end/observaciones-->
                    
                    

                    <div class   ="form-group">
                        <div class   ="col-sm-8">
                            <input class ="btn btn-primary" type="submit" value= "Generar" id= "enviar" name="enviar" onclick ="this.form.action='../Controlador/GeneradorOrdenDeCambio.php?id=0'"></input> &nbsp;&nbsp;                      
                        </div>
                    </div><!--end/submit-->
                </div> 
            </form>  

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
