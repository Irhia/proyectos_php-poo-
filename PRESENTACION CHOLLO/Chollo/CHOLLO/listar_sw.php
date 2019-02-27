<?php
include_once 'app/Conexion.inc.php';
include_once 'app/SW.inc.php';
include_once 'app/RepositorioSW.inc.php';
include_once 'app/ValidadorSW.inc.php';

/*
$sw_insertado = RepositorioSW :: obtener_todos(Conexion :: obtener_conexion());

	echo "<table style='width:100%' >";
	echo "<tr align='left'>";
	echo "<th>Nombre</th>";
	echo"<th> Descripcion</th>";
	echo "</tr>";
for ($i=0;$i<count($sw_insertado);$i++)

{	
	$nombre=$sw_insertado[$i]->obtener_nombre();
	$descripcion=$sw_insertado[$i]->obtener_descripcion();
	echo "<tr align='left'>";
	echo "<td>$nombre</td>";
	echo "<td>$nombre</td>";
	echo "<td><a href='plantillas/eliminar_sw.php?nombre=$nombre'><img src='image\borrar_basura.png' height='20' width='20'>";
	echo "</a></td>";
	echo "</tr>";
 }
echo "</table>";
Conexion :: cerrar_conexion();
*/


Conexion :: abrir_conexion();

$sw = new Sitios_Web ();

$sw_insertados = RepositorioSW :: obtener_todos(Conexion :: obtener_conexion());

?>

<table  style="width:100%">

    <tr>
      <th>Id Sitios Web</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Url</th>
    </tr>


 <?php 
for ($i=0;$i<count($sw_insertados);$i++)
{
?>

	<form id="form<?php echo $i ?>" name="form1" method="post" action="plantillas/update_sw.php">
<?php
	$id = $sw_insertados[$i]->obtener_id();
	$nombres = $sw_insertados[$i]->obtener_nombre();
	$descripcions = $sw_insertados[$i]->obtener_descripcion();
	$url = $sw_insertados[$i]->obtener_url();
?>
<tr>
	  <td align="left"><input type="text" name="id_sw" id="id_sw" style="border:none"  readonly value= "<?php echo $id ?>" /></td>
      <td align="left"><input type="text" name="nombre" id="nombre" style="border:none" value="<?php echo $nombres ?>" /></td>
      <td align="left"><input type="text" name="descripcion" id="descripcion" style="border:none" value="<?php echo $descripcions ?>" /></td>
      <td align="left"><input type="text" name="url" id="url" style="border:none" value="<?php echo $url ?>" /></td>
      <td> <?php echo "<a href='plantillas/eliminar_sw.php?nombre=$nombres'><img src='image\borrar_basura.png' height='20' width='20'></a></td>"; ?> </td>

 	 <td><input type="image" src="image/aa.png" height="20" width="20"></td>
 </tr>
 	  </form>  
 	  	

<?php
}
?>
    

</table>

<?php


 
Conexion :: cerrar_conexion();


?>