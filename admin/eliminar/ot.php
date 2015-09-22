<?php 

include("../bd/conexion.php"); 
$link=Conectarse(); 
$ID=$_REQUEST['id']; 
$Sql="DELETE FROM ot_horas WHERE id_ot_horas='$ID'";

$result         =mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else{

?>
<script>

window.location = "/control-ingenieria/admin/pages/ot";
</script>

<?php

}

