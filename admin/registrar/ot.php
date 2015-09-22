<?php 
include('../bd/conexion.php');
$link=Conectarse();

$OT=$_REQUEST[ot];
$HORAS=$_REQUEST[horas];
$NOMBRE=$_REQUEST[nombre];
$DESCRIPCION=$_REQUEST[descripcion];
$EMPRESA=$_REQUEST[empresa];

$SQL="INSERT INTO ot_horas(ot,nombre,descripcion,horas,empresa)
VALUES('$OT','$NOMBRE','$DESCRIPCION','$HORAS','$EMPRESA')";

$result=mysql_query($SQL);

if (!$result)
 {
	echo "error";
 }
 else
 {
	header('Location: /control-ingenieria/admin/pages/ot');
 }

 ?>