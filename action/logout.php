<?php
session_start();
if(!empty($_SESSION['Authenticated']))
{
$_SESSION['Authenticated']="";
session_destroy();
}
header("Location:../index.php");
?>