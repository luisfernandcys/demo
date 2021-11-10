    <?php
    define('HOME_PATH', 'https://mikrotik.flylancer.net/demo/');
    $menu =     '<!-- START PAGE SIDEBAR -->';
    $menu .=    '<div class="page-sidebar">';
    $menu .=    '<!-- START X-NAVIGATION -->';
    $menu .=    '<ul class="x-navigation">';
    $menu .=    '<li class="xn-logo">';
    $menu .=    '<a href="'.HOME_PATH.'inicio.php">DEMOTIK</a>';
    $menu .=    '<a href="#" class="x-navigation-control"></a>';
    $menu .=    '</li>';
    $menu .=    '<li class="xn-profile">';
    $menu .=    '<div class="profile">';
    $menu .=    '<div class="profile-data">';
    $menu .=    '<div class="profile-data-name"></div>';
    $menu .=    '<div class="profile-data-title"></div>';
    $menu .=    '</div>';
    $menu .=    '</div>';
    $menu .=    '</li>';
    $menu .=    '<li class="active">';
    $menu .=    '<a href="'.HOME_PATH.'inicio.php"><span class="fa fa-desktop"></span> <span class="xn-text">Inicio</span></a>';
    $menu .=    '</li>';
    $menu .=    '<li class="xn-openable">';
    $menu .=    '<a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Usuarios</span></a>';
    $menu .=    '<ul>';
    $menu .=    '<li><a href="'.HOME_PATH.'usuarios/listado.php"><span class="fa fa-users"></span> Listado</a></li>';
    $menu .=    '<li><a href="'.HOME_PATH.'usuarios/listadomk.php"><span class="fa fa-users"></span> Listado Mikrotik</a></li>';
    $menu .=    '<li><a href="'.HOME_PATH.'usuarios/crear_usuario.php"><span class="fa fa-file"></span> Crear usuario</a></li>';
    //$menu .=    '<li><a href="anexos"><span class="fa fa-file"></span> Anexos</a></li>';
    $menu .=    '</ul>';
    if ($solo_NOC) {
    } else {
    }
    $menu .=    '</ul>';
    $menu .=    '<!-- END X-NAVIGATION -->';
    $menu .=    '</div>';
    $menu .=    '<!-- END PAGE SIDEBAR -->';

    $salir = HOME_PATH."action/logout.php";
    ?>