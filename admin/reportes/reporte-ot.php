<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>REPORTES</title>
<?php include('../header.php'); ?>
<?php 
$FECHAINICIO=$_REQUEST[fechainicio];
$FECHAFIN=$_REQUEST[fechafin];
?>
<script language="javascript">
$(document).ready(function() {
$(".botonExcel").click(function(event) {
$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
$("#FormularioExportacion").submit();
});
});
</script>

<style type="text/css">
.botonExcel{cursor:pointer;}

.tamano{
  font-size: 40px;
}
</style>
</head>
<body>

<div class="container">
<div class="row clearfix">
<div class="col-md-2 column">
<form action="reporte-ot" method="POST">
<label>FECHA DE INICIO</label>
<input type="date"  name="fechainicio" value="<?php echo $FECHAINICIO ?>" class="form-control" required>
</div>
<div class="col-md-2 column">
<label>FECHA DE FIN</label>
<input type="date"  name="fechafin" value="<?php echo $FECHAFIN ?>" class="form-control" required>
</div>
<div class="col-md-2 column">
<br>
<button class="btn btn-primary">CONSULTAR</button>
</form>
</div>
</div>
<div class="row clearfix">
<div class="col-md-9 column">
<h2 class="text-center text-success">
REPORTE x OT
 </h2>
</div>
<div class="col-md-3 column">

<form action="generar-excel-x-ot.php" method="post" target="_blank" id="FormularioExportacion">
<p> 
<img src="/control-ingenieria/include/img/excel.png" class="img-responsive botonExcel" 
 title="DESCARGAR ARCHIVO"id="#excel" width="50">
</p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>


</div>		
</div>
<div class="row clearfix">
<div class="col-md-12 column">
<div class="table-responsive">
<table class="table table-bordered table-condensed" id="Exportar_a_Excel" border="1">
<thead>
<tr class="success">
<th width="100">OT</th>
<th>NOMBRE</th>
<th>CANTIDAD DE HORAS TRABAJADAS</th>
<th>HORAS PROGRAMADAS</th>
<th>PORCENTAJE DE AVANCE %</th>
<th>HORAS FALTANTES</th>
<th>HORA EXTRAS</th>
<th>FECHA DE INICIO</th>
<th>FECHA DE FIN</th>
</tr>
</thead>
<?php 
$link=  Conectarse();
$listado=  mysql_query("SELECT
 r.ot_codigoot,o.nombre,o.descripcion,o.horas,sum(r.horas_hombre)  AS horashombre
  from reporte_trabajo as r INNER JOIN 	ot_horas o ON 
  r.ot_codigoot=o.ot where r.estado='02'
AND  r.fecha_inicio between'$FECHAINICIO' and '$FECHAFIN'
group by r.ot_codigoot 
order by sum(r.horas_hombre) desc",$link);
?>
<tbody>
<?php

while($reg=  mysql_fetch_array($listado)) 
{
?>
<tr>
<td style="mso-number-format:'@'"><?php echo $reg[ot_codigoot]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[nombre]; ?></td>
<td><?php echo round($reg[horashombre],2) ?></td>
<td><?php echo round($reg[horas],2) ?></td>
<td><?php echo round(($reg[horashombre]*100)/$reg[horas],2).' %' ?></td>
<td>
<?php 
if (($reg[horas]-$reg[horashombre])<0) 
{
echo "0";
}
else
{
echo round($reg[horas]-$reg[horashombre],2);
}
?>
</td>
<td>
<?php 
if (($reg[horas]-$reg[horashombre])<0) 
{
echo abs(round($reg[horas]-$reg[horashombre],2));
}
else
{
echo "0";
}
?>
</td>
<td><?php echo date("d-m-Y", strtotime($FECHAINICIO)); ?></td>
<td><?php echo date("d-m-Y", strtotime($FECHAFIN)); ?></td>

<?php } ?>

</tr>


</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>