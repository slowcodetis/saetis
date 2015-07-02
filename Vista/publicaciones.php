<?php  
    session_start();
    $uActivo = $_SESSION['usuario'];
    include '../Modelo/conexion.php';
    $con=new conexion();

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

    <style>
        .menuScroll {
            overflow-y: scroll;
            max-height: 300px;
        }
    </style>


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
                <h4 class="modal-title">Seguimiento Semanal</h4>
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
        <div class ="form-horizontal">
                <div class="row">
                    <div class="col-lg-12">
                    </br></br>
                    <h2>Publicaciones</h2>     
                        <form id = "publicar" method = "POST" action="" onsubmit = "return validarCampos(this);">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <fieldset class="campos-border">
                                        <legend class="campos-border">Documentos</legend>
                                        <table class="table form-group">      
                                            <thead>
                                                    <tr>
                                                      <th># ID </th>
                                             
                                                      <th>Nombre</th>
                                                      <th>Descripcion</th>
                                                      <th>Accion</th>   
                                                    </tr>
                                            </thead>
                                            <tbody>                                                    
                                            <?php 
                                           
                                            $indice = 1;

                                            $Sel_Desc = $con->consulta("SELECT d.RUTA_D,r.NOMBRE_R, ds.DESCRIPCION_D 
                                                    FROM documento as d, registro as r,descripcion as ds 
                                                    WHERE r.NOMBRE_U = '$uActivo' AND r.TIPO_T = 'publicaciones' AND r.ID_R=ds.ID_R AND d.ID_R = r.ID_R"); 

                                            while ($Desc = mysql_fetch_row($Sel_Desc)) {

                                                if(!empty($Desc[0]))
                                                {
                                                   
                                                echo   '<tr>
                                                            <td>'.$indice.'</td>
                                                            
                                                            <td>
                                                                <a class="link-dos" target="_blank" href='.$Desc[0].' onclick="">'.$Desc[1].'<span class="instancename">    
                                                                <span class="accesshide "></span></a>
                                                            </td>

                                                            <td>'.$Desc[2].'</td>
                                                            <td><a class="link-dos" href="../Vista/eliminar_publicacion.php?id_us='.$Desc[1].'">Eliminar</a></td>
                                                        </tr>';
                                                    }

                                                $indice++;
                                            }



                                            ?>
                                            </tbody>
                                        </table>
                                    </fieldset>
                             

                                </div>
                                <div class="panel-footer">
                                    <a href="../Vista/publicar_asesor.php" class="link" ><i class="fa fa-plus "></i> Agregar recurso<span class="fa arrow"></span></a>
                                </div>
                            </div>
                        </form>

                         <form id = "publicar" method = "POST" action="" onsubmit = "return validarCampos(this);">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <fieldset class="campos-border">
                                        <legend class="campos-border">Anuncios</legend>
                                        <table class="table form-group">      
                                            <thead>
                                                    <tr>
                                                      <th># ID </th>
                                             
                                                      <th>Nombre</th>
                                                      <th>Descripcion</th>
                                                      <th>Accion</th>   
                                                    </tr>
                                            </thead>
                                            <tbody>                                                    
                                            <?php 
                                           
                                            $indiceA = 1;

                                            $Sel_Desc = $con->consulta("SELECT d.RUTA_D,r.NOMBRE_R, ds.DESCRIPCION_D 
                                                    FROM documento as d, registro as r,descripcion as ds 
                                                    WHERE r.NOMBRE_U = '$uActivo' AND r.TIPO_T = 'publicaciones' AND r.ID_R=ds.ID_R AND d.ID_R = r.ID_R"); 

                                            while ($Desc = mysql_fetch_row($Sel_Desc)) {

                                                if(empty($Desc[0]))
                                                {
                                                     echo   '<tr>
                                                            <td>'.$indiceA.'</td>
                                                            
                                                            <td>'.$Desc[1].
                                                            '</td>
                                                            <td>'.$Desc[2].'</td>
                                                            <td><a class="link-dos" href="../Vista/eliminar_publicacion.php?id_us='.$Desc[1].'">Eliminar</a></td>
                                                        </tr>';
                                                        $indiceA++;
                                               
                                                }

                                                
                                            }



                                            ?>
                                            </tbody>
                                        </table>
                                    </fieldset>
                             

                                </div>
                                <div class="panel-footer">
                                    <a href="../Vista/publicar_asesor.php" class="link" ><i class="fa fa-plus "></i> Agregar recurso<span class="fa arrow"></span></a>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.col-lg-12 -->
                </div>
        </div>
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