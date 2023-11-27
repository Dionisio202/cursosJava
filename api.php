<?php
include_once("selecionar.php");
$opc=$_SERVER["REQUEST_METHOD"];
switch($opc){
case "GET": 
    $curso=$_GET["curso"];
    $nivel=$_GET["nivel"];
    buscar::Busca($curso,$nivel);
    break;
}
?>