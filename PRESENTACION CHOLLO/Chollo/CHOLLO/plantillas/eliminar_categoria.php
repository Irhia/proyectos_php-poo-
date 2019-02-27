<?php

include_once './../app/Conexion.inc.php';
include_once './../app/Categoria.inc.php';
include_once './../app/RepositorioCategoria.inc.php';
include_once './../app/ValidadorCategoria.inc.php';


$nombre=$_GET["nombre"];

	Conexion :: abrir_conexion();

		
			$categoria_insertado = RepositorioCategoria :: eliminar_cartegoria_enviada(Conexion :: obtener_conexion(), $nombre);


	Conexion :: cerrar_conexion();

//Saber la ruta actual.
//echo getcwd();

//Recojo el nombre para eliminar la categoria.
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
  		 body {	background-image: url(../image/doodles.png); }
 	</style>
<title>Categoría</title>
</head>

<body>
	<br>
    <br>
    <br>
		<h1 align="center" style = "color: #DC143C;">¡Registro <?php echo $nombre; ?> eliminado con exito!</h1>
	<br>
    <br>
    <br>
<?php
	Conexion :: abrir_conexion();

$categoria = new Categoria ();

$categoria_insertado = RepositorioCategoria :: obtener_todos(Conexion :: obtener_conexion());
?>

<table  border="1"  bordercolor="#B70306" style='width:50%' align="center" bgcolor="#F5F0F0">
<tr align="center" width="50" height="50" bgcolor="#A9A9F5">
<th><h2>Id categoría</h2></th>
<th><h2>Nombre</h2></th>
<th><h2> Descripcion</h2></th>
</tr>


<?php
for ($i=0;$i<count($categoria_insertado);$i++)

{	
	$id=$categoria_insertado[$i]->obtener_id();
	$nombre=$categoria_insertado[$i]->obtener_nombre();
	$descripcion=$categoria_insertado[$i]->obtener_descripcion();
?>
<tr align="center"  width="50" height="50">
<td style="color:#ff0000"><strong>  <?php echo $id; ?></td>
<td> <strong> <?php echo $nombre; ?></strong></td>
<td> <strong><?php echo $descripcion; ?></strong></td>
	
</td>
</tr>
<?php } ?>
</table>

<input type="button" >
<?php
 
Conexion :: cerrar_conexion();

?>
</body>
</html>