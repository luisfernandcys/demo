<?php
session_start();
if ($_SESSION['Authenticated'] != "1") {
    header('Location: index');
}
require("../includes/variables.php");
require('../functions/funciones.php');
include("../action/security.php");
require('../apimikrotik.php');

$id = $_GET['id'];

$par = '=.id='.$id;
//print_r($par);
$API = new routeros_api();
$API->debug = false;
if ($API->connect(IP_MIKROTIK, USER, PASS)) {
    $API->write("/tool/user-manager/user/set", false);
    //$API->write('=.id=*F', false);
    $API->write($par , false);
    $API->write('=disabled=no', true );
    $READ = $API->read(false);
    $ARRAY = $API->parse_response($READ);
    print_r($ARRAY);
    $db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DB);
    $idd = "'".$id."'";
  $queryi = "UPDATE clientes SET estadom='false' where  idm=$idd";
 
  $resultado = mysqli_query($db, $queryi);
  header('Location: https://mikrotik.flylancer.net/demo/usuarios/listado.php');
} else {
    echo "No hay conexion";
}
