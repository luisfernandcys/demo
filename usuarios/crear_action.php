<?php
session_start();
if ($_SESSION['Authenticated'] != "1") {
  header('Location: index');
}
require("../includes/variables.php");
require('../functions/funciones.php');
include("../action/security.php");
require('../apimikrotik.php');
$API = new routeros_api();
$API->debug = false;
if ($API->connect(IP_MIKROTIK, USER, PASS)) {


  $name = $_POST["name"];
  //Creacion de Queues Simples
  $username = $_POST["usernamem"];
  if ($name == "") {
    echo "Nombre no puede estar vac&iacute;o";
  }

  print_r($_POST);
  
  $API->write("/tool/user-manager/user/add", false);
  $API->write("=customer=" . 'cabasu', false);
  $API->write("=username=".$_POST["usernamem"],false);
  $API->write("=password=".$_POST["passwordm"],false);
//  $API->write("=disabled=".$_POST["estadom"],false);
  $API->write("=disabled=false",false);
  $API->write("=shared-users=".'1',true);
  $READ = $API->read(false);
  $ARRAY = $API->parse_response($READ);
  print_r($READ);

  $API->write("/tool/user-manager/user/create-and-activate-profile",false);
  //$API->write("=numbers="."\"".$_POST["usernamem"]."\"",false);
  
  $API->write("=customer=".'cabasu',false);
  //$API->write("=username=".$_POST["usernamem"],true);
  $API->write("=profile=Profile1",true);
  
  $READ = $API->read(false);
  print_r($READ);
  die();
  // print_r('<pre>');
  // print_r($ARRAY);
  // print_r('</pre>');
  $name = $_POST['name'];
  $correo = $_POST['correo'];
  $usernamem = $_POST['usernamem'];
  $customerm = 'cabasu';
  $idm = $ARRAY;
  $passwordm = $_POST['passwordm'];
  $ultimac='0000-00-00 00:00:00';
  $estadom=$_POST['estadom'];
  $estados=$_POST['estados'];
  $db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DB);
  $queryi = "INSERT INTO clientes(nombre_completo,correo,usernamem,customerm,idm,passwordm,ultimac,estadom) VALUES('$name','$correo','$usernamem','$customerm','$idm','$passwordm','$ultimac','$estadom');";
  //echo $queryi;
  $resultado = mysqli_query($db, $queryi);
  //header('Location: https://mikrotik.flylancer.net/demo/usuarios/listado.php');
  //elseif ($identificacion == ""){
  //  echo "Debe ingresar un n&uacute;mero de documento";
  //} elseif (!filter_var($target, FILTER_VALIDATE_IP)){
  //  echo "Debe ingresar una IP V&aacute;lida";
  //}else{
  //if ($prioridad == "1/1") {
  //  $uploadCalculado = 1;
  //}elseif ($prioridad == "4/4") {
  //$uploadCalculado = 0.75;
  //}elseif ($prioridad == "6/6") {
  //  $uploadCalculado = 0.50;
  //}
  //elseif ($prioridad == "8/8") {
  //  $uploadCalculado = 0.25;
  //}
  //$mask = "/32";
  //$upload = ($download*$uploadCalculado);
  //$bytesUpload = ($upload*1024);
  //$bytesDownload = ($download*1024);
  //$total_canal = $bytesUpload."/".$bytesDownload;
  // $insertar = "1";
  //   $API->write("/queue/simple/getall",false);
  //  $API->write("?target=".$target.$mask,true);
  //  $READ = $API->read(false);
  //  $ARRAY = $API->parse_response($READ);
  //   if(count($ARRAY)>0){ // si el nombre de usuario "ya existe" lo edito
  //           echo "Error: La IP No puede estar repetida.";
  //       }else{
  //           $API->write("/queue/simple/add",false);
  //           $API->write("=name=".$user,false);
  //           $API->write("=target=".$target,false);
  //           $API->write("=max-limit=".$total_canal,false);
  //           $API->write("=limit-at=".$total_canal,false);
  //           $API->write("=priority=".$prioridad,false);
  //           $API->write("=place-before=".$insertar,true);
  //           $READ = $API->read(false);
  //           echo("1");
  //       }
} else {
  echo "No hay conexion";
}
