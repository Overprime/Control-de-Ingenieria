 <?php 

include("../bd/conexion.php");
@session_start();

$link=Conectarse();
$HORAINICIO=$_REQUEST['horainicio']; //hora de inicio
$HORAFIN=$_REQUEST['horafin']; //hora de fin

/*REALIZAMOS LA CONSULTA PARA OBTENER LA DESCRIPCION DE LA HORA DE INCIO*/

$sql="SELECT  fi.descripcion from fechainicio as fi where valor='$HORAINICIO'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$DescHORAINCIO=$row[descripcion];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 

/*REALIZAMOS LA CONSULTA PARA OBTENER LA DESCRIPCION DE LA HORA DE FIN*/

$sql="SELECT  ff.descripcion from fechafin as ff where valor='$HORAFIN'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$DescHORAFIN=$row[descripcion];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 




$USUARIO=$_SESSION['idusuario']; ; //idusuario
$NOMBREUSUARIO=$_SESSION['nombres'].' '.$_SESSION['apellidos'];
$AREA=$_SESSION['idarea'];   //idarea
$NOM_AREA=$_SESSION['nom_area'];   //nombre del area
$OT=$_REQUEST['ot'];  //ot
$FECHA=$_REQUEST['fecha'];//fecha de reporte
$HORAS_TRABAJO=$HORAFIN-$HORAINICIO;//horas de trabajo
$HORAS_HOMBRE=(floatval($HORAFIN)-floatval($HORAINICIO))/60; //horas hombre
$DETALLE=$_REQUEST['detalle']; //detalle de trabajo



$Sql="INSERT INTO reporte_trabajo(fecha_inicio,hora_inicio,hora_fin,
horas_trabajo,descripcion_trabajo,horas_hombre,fecha_creacion,usuario_idusuario,
nombre_usuario,area_codigoarea,nom_area,ot_codigoot,cencos)values('$FECHA','$DescHORAINCIO',
'$DescHORAFIN','$HORAS_TRABAJO','$DETALLE','$HORAS_HOMBRE',now(),'$USUARIO',
'$NOMBREUSUARIO','$AREA','$NOM_AREA','$OT','')";

$result=mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else{

?>
<script>

window.location = "/control-ingenieria/pages/creacion-de-reporte";
</script>

<?php

}


?>
