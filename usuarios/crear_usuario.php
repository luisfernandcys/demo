<?php
session_start();
if ($_SESSION['Authenticated'] != "1") {
    header('Location: index');
}
require("../includes/variables.php");
require('../functions/funciones.php');
include("../action/security.php");
include("../layouts/menu.php");
require('../apimikrotik.php');
$API = new routeros_api();
$API->debug = false;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- META SECTION -->
    <meta name="description" content="SISTEMA DE GESTION - WIFICOLOMBIA">
    <title>Sistema de Gesti&oacute;n <?php echo $Identidad_Mikrotik; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="<?php echo $Autor ?>">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="../css/theme-default.css" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">
        <?php if ($API->connect(IP_MIKROTIK, USER, PASS)) {; ?>
            <?= $menu; ?>

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- SEARCH -->
                    <!-- <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..." />
                        </form>
                    </li> -->
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Usuarios</a></li>
                    <li><a href="#">Crear usuario</a></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-title">
                    <h2 style="margin: 20px;">Informaci&oacute;n General</h2>
                </div>
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="block">
                                <form role="form" id="Crear_Cliente" action="crear_action.php" method="POST">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nombre completo</label>
                                            <div class="col-md-8">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Correo</label>
                                            <div class="col-md-8">
                                                <input type="text" id="correo" name="correo" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Username</label>
                                            <div class="col-md-8">
                                                <input type="text" id="usernamem" name="usernamem" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Password</label>
                                            <div class="col-md-8">
                                                <input type="text" id="passwordm" name="passwordm" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-md-4 control-label">Usuario Estado</label>
                                            <div class="col-md-8">
                                                <select id="estadom" name="estadom" class="form-control">
                                                    <option value="false">Activo</option>
                                                    <option value="true">Inactivo</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label class="col-md-4 control-label">Estado session</label>
                                            <div class="col-md-8">
                                                <select id="estados" name="estados" class="form-control">
                                                    <option value="false">Activo</option>
                                                    <option value="true">Inactivo</option>
                                                </select>
                                            </div>
                                        </div> -->

                                        <input type="hidden" class="minusculas" name="user" id="user">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary pull-right">Agregar</button>
                                        </div>
                                    </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        <?php
        } else {
            echo "No hay conexion";
        }

        ?>
    </div>
    <!-- END PAGE CONTAINER -->
    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out">&iquest;</span>Cerrar <strong>Sesi&oacute;n</strong> ?</div>
                <div class="mb-content">
                    <p>&iquest;Esta seguro que desea salir?</p>
                    <p>Presione No si desea continuar trabajando. Presione Si para salir del sistema de forma segura.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="<?= $salir; ?>" class="btn btn-success btn-lg">Si</a>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->
    <!-- START PRELOADS -->
    <audio id="audio-alert" src="../audio/alert.mp3" preload="auto"></audio>
    <audio id="audio-fail" src="../audio/fail.mp3" preload="auto"></audio>
    <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
    <!-- START PLUGINS -->
    <script type="text/javascript" src="../js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- END PLUGINS -->

    <!-- THIS PAGE PLUGINS -->
    <script type='text/javascript' src='../js/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

    <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-file-input.js"></script>
    <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-select.js"></script>
    <script type="text/javascript" src="../js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
    <!-- END THIS PAGE PLUGINS -->

    <!-- START TEMPLATE -->
    <script type="text/javascript" src="../js/plugins.js"></script>
    <script type="text/javascript" src="../js/actions.js"></script>
    <!-- END TEMPLATE -->
    <script type="text/javascript">
        jQuery(document).ready(function() {
            $('#no_id').blur(function() {
                var user_name = $('#name').val();
                var user = user_name.replace(/\s+/g, '');
                var user_id = $('#no_id').val();
                $('#user').val(user_id + "-" + user);
            });
            $("#Crear_Cliente_Queue").submit(function() {
                $.ajax({
                    type: "POST",
                    url: '../action/Procesos_Queue.php',
                    data: $("#Crear_Cliente_Queue").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data) {
                        if (data == '1') {
                            $("#Notificacion").addClass('success-noty').fadeIn();
                            $(".noty_text").html("Cliente Creado");
                            $("#Crear_Cliente_Queue input").val("");
                            $(".page-content-wrap").slideUp().delay(1000).slideDown();
                        } else {
                            $("#Notificacion").addClass('error-noty').fadeIn();
                            $(".noty_text").html(data);
                        }
                    },
                    beforeSend: function() {
                        $("#info").html('<i class="fa fa-spinner fa-spin"></i>Espere')
                    }
                });
                return false;
            });
            $('.Kbytes').blur(function() {
                if (this.value.indexOf('K') == -1) {
                    this.value = this.value + 'K';
                }
            });
            $('#Notificacion').click(function() {
                $(this).fadeOut();
            });
        });
    </script>
    <!-- END SCRIPTS -->
    <!-- Notificacion -->
    <ul id="Notificacion">
        <li>
            <div>
                <div class="info_noty">
                    <span class="noty_text"></span>
                </div>
        </li>
    </ul>
</body>

</html>