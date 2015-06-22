<!DOCTYPE html>
<?php
    include '../Modelo/conexion.php';
?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Apoyo a la Empresa TIS</title>
    <link href="../Librerias/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Librerias/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../Librerias/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
    <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    <script src="../Librerias/js/validar_nombre.js" type="text/javascript"></script>
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
                <a class="navbar-brand" href="../index.php">Inicio </a>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Verificar Nombre de Grupo Empresa</h2>
                    <div class="col-lg-6" >
                        
                            <div class="form-group">
                                
                                    <div class="form-group">
                                        <form action= "consultar_nombre.php" name="formulario1" role="form" method="post" onsubmit="return validarCampos(this)">
                                            <label id="label"><h5>Introduzca el Nombre Largo de su empresa:</h5></label>
                                            <input name="nombre" class="form-control" onkeypress="return validarLetras(event)"><br>
                                            <label id="label"><h5>Introduzca el Nombre Corto de su empresa:</h5></label>
                                            <input name="nombreCorto" class="form-control" onkeypress=" return validarLetras(event)"><br>
                                            <button type="submit" class="btn btn-primary">Revisar</button><br><br>
                                        </form>
                                        <form action="ver_nombres.php" name="formulario2" role="form" method="post" target="_blank">
                                            <button type="submit" class="btn btn-primary" target="_blank" >Ver Nombres Registrados</button><br><br>
                                        </form>
                                    </div>
                               
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../Librerias/js/jquery-1.10.2.js"></script>
    <script src="../Librerias/js/bootstrap.min.js"></script>
    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../Librerias/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="../Librerias/js/plugins/morris/morris.js"></script>
    <script src="../Librerias/js/sb-admin.js"></script>
    <script src="../Librerias/js/demo/dashboard-demo.js"></script>
    
</body>

</html>
