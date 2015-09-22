<?php 
/*REALIZAMOS LA CONSULTA PARA OBTENER EL CORRELATIVO DEL ULTIMO REGISTO*/
//$link=Conectarse();

$sql="SELECT substring(ot,4) AS correlativo FROM ot_horas
WHERE empresa='RO'
 ORDER BY ot  DESC limit 1; ";
$result =mysql_query($sql,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$IDRO=$row[correlativo];

} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 
function cerosr($numero, $ceros=2){
return sprintf("%0".$ceros."s", $numero ); 
}
$CORRELATIVORO=$IDRO+1;
$NUMERORO="RO-".ceros($CORRELATIVORO, 4);
?>

<div class="form-group">
<a id="modal-822096" href="#modal-container-8220" 
role="button" class="btn btn-primary btn-block" data-toggle="modal">
<i class="glyphicon glyphicon-plus-sign"></i>
CREAR OT ROCKDRILL</a>

<div class="modal fade" id="modal-container-8220" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-primary" id="myModalLabel">
<b>REGISTRAR OT</b>
</h4>
</div>
<div class="modal-body">
<div class="form-group">
<form action="../registrar/ot.php" method="POST">
<label>ORDEN DE TRABAJO</label>
<input type="text" name="ot"class="form-control"  
onchange="conMayusculas(this);"  value="<?php echo $NUMERORO; ?>" READONLY >
</div>
<div class="form-group">
<label>NOMBRE</label>
<input type="text" class="form-control" name="nombre" onchange="conMayusculas(this);"
REQUIRED>
</div>
<div class="form-group">
<label>DESCRIPCIÓN</label>
<textarea name="descripcion" id="" cols="30" rows="3" class="form-control" 
onchange="conMayusculas(this);" REQUIRED>
</textarea>
</div>
<div class="form-group">
<label>HORAS</label>
<input type="number" name="horas" class="form-control" min='0' step="any" 
onchange="conMayusculas(this);" >
</div>
<input type="hidden" value="RO" name="empresa">
</div>
<div class="modal-footer">
 <button type="submit" class="btn btn-primary">CREAR</button>
<button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
</form>
</div>
</div>

</div>

</div>
</div>