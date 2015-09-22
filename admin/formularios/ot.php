<?php 
/*REALIZAMOS LA CONSULTA PARA OBTENER EL CORRELATIVO DEL ULTIMO REGISTO*/
/*
$link=Conectarse();
$sql="SELECT substring(ot,7) AS correlativo FROM ot_horas
 ORDER BY ot  DESC limit 1;; ";
$result =mysql_query($sql,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$ID=$row[correlativo];

} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 
function ceros($numero, $ceros=2){
return sprintf("%0".$ceros."s", $numero ); 
}
$CORRELATIVO=$ID+1;
$NUMERO="ING".ceros($CORRELATIVO, 4);*/
?>



<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#horainicio").change(function () {
$("#horainicio option:selected").each(function () {
elegido=$(this).val();
$.post("horas.php", { elegido: elegido }, function(data){
$("#horafin").html(data);
});     
});
});    
});
</script>	

<div class="form-group">
<a id="modal-822096" href="#modal-container-822096" 
role="button" class="btn btn-primary btn-block" data-toggle="modal">
<i class="glyphicon glyphicon-plus-sign"></i>
CREAR OT</a>

<div class="modal fade" id="modal-container-822096" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-primary" id="myModalLabel">
<b>REGISTRAR OT</b>
</h4>
</div>
<div class="modal-body">

<form action="../registrar/ot.php" method="POST">
<div class="form-group">
<label>HORA INICIO:</label>
<select name="horainicio" class="form-control" id="horainicio"required>
<option value="">[SELECCIONAR]</option>
<?php
$Sql="SELECT valor,descripcion FROM fechainicio 
;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['valor']?>"><?php echo $row['descripcion']?></option>
<?php }?>
</select>
</div>

<div class="form-group">
<label>HORA FIN:</label>
<select class="form-control"  name="horafin" id="horafin" required>
</select>
</div>

<div class="form-group">
<label>ORDEN DE TRABAJO</label>
<input type="text" name="ot"class="form-control"  
onchange="conMayusculas(this);"  value="<?php echo $NUMERO; ?>" READONLY >
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