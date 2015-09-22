
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>OT</title>
<?php include('../header.php'); ?>
<style type="text/css">
  
  th,td{
font-size: 13px;

  }

</style>
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-4 column">
<?php include('../formularios/ot-co.php'); ?>
</div>
<div class="col-md-4 column">
<?php include('../formularios/ot-ov.php'); ?>
</div>
<div class="col-md-4 column">
<?php include('../formularios/ot-ro.php'); ?>
</div>
</div>
<div class="row clearfix">
<div class="col-md-12 column">
<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr class="success">	
<th width="100">OT</th>
<th>NOMBRE</th>
<th>DESCRIPCIÓN</th>
<th>FECHA INICIO</th>
<th>FECHA FIN</th>
<th>HORAS</th>
<th>ESTADO</th>
<th  style="text-align: center"  width="1" >
<a href=""><i class="glyphicon glyphicon-edit"></i></th>
<th  style="text-align: center"  width="1" >
<a href=""><i class="glyphicon glyphicon-trash text-danger"></i></th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT id_ot_horas,ot,nombre,fecha_inicio,fecha_fin,
descripcion,horas,estado,
DATE_FORMAT(fecha_inicio,'%d/%m/%Y')AS FECHAINICIO,
DATE_FORMAT(fecha_fin,'%d/%m/%Y')AS FECHAFIN FROM ot_horas ORDER BY ot";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr class="active">
<?php 
$txta                      ='modal-containera-';
$txtxa                     ='#modal-containera-';
$txta                      .=$j;
$txtxa                     =$txtxa.=$j;

$txt                       ='modal-container-';
$txtx                      ='#modal-container-';
$txt                       .=$i;
$txtx                      =$txtx.=$i;


?>
<td><?php echo $row[ot]; ?></td>
<td><?php echo $row[nombre]; ?></td>
<td><?php echo $row[descripcion]; ?></td>
<td><?php echo $row[FECHAINICIO]; ?></td>
<td><?php echo $row[FECHAFIN]; ?></td>
<td><?php echo round($row[horas],2); ?></td>
<td>
<?php 
 if ($row[estado]=='00')
  {
 	echo "<label class='text-primary'>ACTIVO</label>";
  }
  else if ($row[estado]=='01')
  {
  	echo "<label class='text-warning'>INACTIVA</label>";
  }
  else
  {
  		echo "<label class='text-danger'>LIQUIDADA</label>";
  }
 ?>
 </td>
<td class="text-primary">
<a id="modal-899574" href='<?php echo $txtx;?>'
role="button" class="btn" data-toggle="modal">
<i class="glyphicon glyphicon-edit text-primary">	</i></a>
</td>
<td class="text-primary">
<a id="modal-899574" href='<?php echo $txtxa;?>'
role="button" class="btn" data-toggle="modal">
<i class="glyphicon glyphicon-trash text-danger"> </i></a>
</td>

<!-- INICIO MODAL ACTUALIZAR -->
<div class="modal fade" id="<?php echo $txt; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-primary" id="myModalLabel">
ACTUALIZAR INFORMACIÓN
</h4>
</div>
<div class="modal-body">
<div class="form-group">
<form action="../actualizar/ot.php" method="POST" 
autocomplete="Off">
<input type="hidden" name="id" value="<?php echo $row[id_ot_horas]; ?>">
<label>OT</label>
<input type="text" name="ot"class="form-control" 
value="<?php echo $row[ot]; ?>" onchange="conMayusculas(this);"
required readonly>
</div>
<div class="form-group">
<label>NOMBRE</label>
<input type="text" class="form-control"
value="<?php echo $row[nombre]; ?>" 
 name="nombre" onchange="conMayusculas(this);">
</div>
<div class="form-group">
<label>DESCRIPCIÓN</label>
<textarea name="descripcion" id=""  cols="30" rows="3" class="form-control" 
onchange="conMayusculas(this);" REQUIRED>
<?php echo $row[descripcion]; ?>
</textarea>
</div>
<div class="form-group">
<label>FECHA INICIO</label>
<input name="fechainicio" type="date"class="form-control" 
value="<?php echo $row[fecha_inicio]; ?>" step="any" min="0"
required>
</div>
<div class="form-group">
<label>FECHA FIN</label>
<input name="fechafin"  type="date"class="form-control" 
value="<?php echo $row[fecha_fin] ?>" 
required>
</div>
<div class="form-group">
<label>HORAS</label>
<input type="number" name="horas"class="form-control" 
value="<?php echo round($row[horas],2); ?>" step="any" min="0"
required>
</div>
<div class="form-group">
<label>ESTADO</label>
<select name="estado" id="" class="form-control">
<option value="00">ACTIVO</option>
<option value="01">INACTIVA</option>
<option value="02">LIQUIDADA</option>
</select>
</div>
</div>
<div class="modal-footer">
 <button type="submit" class="btn btn-primary">Actualizar</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</form>
</div>
</div>

</div>

</div>		

<!-- fin modal Actualizar -->


<!-- INICIO MODAL ELIMINAR -->
<div class="modal fade" id="<?php echo $txta; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-danger" id="myModalLabel">
ELIMINAR OT
</h4>
</div>
<div class="modal-body">
<form action="../eliminar/ot.php" method="POST" 
autocomplete="Off">
<h2>
¿DESEA ELIMINAR LA OT <?php echo $row[ot]; ?> ?
</h2>
</div>
<div class="modal-footer">
<a href="../eliminar/ot.php?id=<?php echo $row[id_ot_horas]; ?>" class="btn btn-danger">ELIMINAR</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</form>
</div>
</div>

</div>

</div>    

<!-- fin modal eliminar -->
</tr>
<?php 
$i                         =$i+1;
$j                         =$j+1;  
}
 ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>