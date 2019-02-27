<?php

include_once './../app/Conexion.inc.php';	
include_once './../app/SW.inc.php';
include_once './../app/RepositorioSW.inc.php';
include_once './../app/ValidadorSW.inc.php';



$id = $_POST ["id_sw"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$url = $_POST["url"];

Conexion :: abrir_conexion();
		
$sw_insertado = RepositorioSW :: actualizar_sw(Conexion :: obtener_conexion(), $nombre, $descripcion, $url,  $id);


Conexion :: cerrar_conexion();

?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
  		 body {	background-image: url(../image/doodles.png); }
 	</style>
<title>Categoría</title>

</head>

<body >

	<br>
    <br>
    <br>

<h1 align="center" style = "color: #DC143C;">¡Registro <?php echo "Id: " . $id?> actualizado con exito!</h1>
<br>
<br>
<br>
<?php
	Conexion :: abrir_conexion();

$sw = new Sitios_Web ();

$sw_insertado = RepositorioSW :: obtener_todos(Conexion :: obtener_conexion());
?>

<table  border="1"  bordercolor="#B70306" style='width:50%' align="center" bgcolor="#F5F0F0">
<tr align="center" width="50" height="50" bgcolor="#A9A9F5">
<th><h2>Id categoría</h2></th>
<th><h2>Nombre</h2></th>
<th><h2>Descripcion</h2></th>
<th><h2>Url</h2></th>
</tr>


<?php
for ($i=0;$i<count($sw_insertado);$i++)

{	
	$id = $sw_insertado[$i]->obtener_id();
	$nombre = $sw_insertado[$i]->obtener_nombre();
	$descripcion = $sw_insertado[$i]->obtener_descripcion();
	$url = $sw_insertado[$i] -> obtener_url(); 
?>
<tr align="center"  width="50" height="50">
<td style="color:#ff0000"><strong> <?php echo $id; ?></strong></td>
<td> <strong><?php echo $nombre; ?></strong></td>
<td> <strong><?php echo $descripcion; ?> </strong></td>
<td> <strong><?php echo $url; ?> </strong></td>
	
</td>
</tr>
<?php } ?>
</table>

<?php
 
Conexion :: cerrar_conexion();

?>
		

</body>
</html>