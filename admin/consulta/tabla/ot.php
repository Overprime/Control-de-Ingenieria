<script type="text/javascript" language="javascript"
src="listado/ot.js"></script>

<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="ot">
<?php require_once('../bd/conexion.php');
$link=  Conectarse();
$listado=  mysql_query("SELECT * FROM ot_horas ORDER BY ot",$link);
?>
<thead>
<tr>
<th>ORDEN DE TRABAJO</th>
<th>HORAS PROYECTADAS</th>
<th>FECHA DE CREACIÓN</th>
<th width="1"  style="text-align: center">
<a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
</th>
</tr>
</thead>
<tbody>
<?php


while($reg= mysql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[ot]; ?></td>
<td><?php echo round($reg[horas],2); ?></td>
<td><?php echo $reg[fecha_creacion]; ?></td>
<td class="text-primary" style="text-align: center"> 
<a  href="../editar/ot?id=<?php echo $reg[ot];?>
&horas=<?php echo round($reg[horas],2); ?>" class="btn btn-primary">
<i class="glyphicon glyphicon-edit"></i></a>
</td>



</tr>

<?php 

}
?>
<tbody>
</table>
</div>
