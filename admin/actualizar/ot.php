<?php 

include('../bd/conexion.php');
$link=Conectarse();
$OT=$_REQUEST[ot];
$HORAS=$_REQUEST[horas];
$NOMBRE=$_REQUEST[nombre];
$DESCRIPCION=$_REQUEST[descripcion];
$FECHAINICIO=$_REQUEST[fechainicio];
$FECHAFIN=$_REQUEST[fechafin];
$ESTADO=$_REQUEST[estado];
$SQL="UPDATE ot_horas set horas='$HORAS',estado='$ESTADO',
fecha_inicio='$FECHAINICIO',fecha_fin='$FECHAFIN',
nombre='$NOMBRE',descripcion='$DESCRIPCION'
 WHERE ot='$OT'";
$result=mysql_query($SQL);

if (!$result)
 {
echo"error";
 }
else
{

header('Location: /control-ingenieria/admin/pages/ot');	
}

 ?>