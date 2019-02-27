<?php
include_once 'app/Conexion.inc.php';
include_once 'app/SW.inc.php';
include_once 'app/RepositorioSW.inc.php';
include_once 'app/ValidadorSW.inc.php';


Conexion :: abrir_conexion();

$anuncio = new Anuncio ();

$anuncio_insertados = Repositorioanuncio :: obtener_todos(Conexion :: obtener_conexion());

?>

<table  style="width:100%">

    <tr>
      <th>Id categoría</th>
      <th>Nombre</th>
      <th>Descripción</th>
     </tr>


 <?php 
for ($i=0;$i<count($anuncio_insertados);$i++)
{
?>

	<form id="form<?php echo $i ?>" name="form1" method="post" action="plantillas/update_anuncio.php">
<?php
	$id = $anuncio_insertados[$i]->obtener_id();
	$nombres = $anuncio_insertados[$i]->obtener_nombre();
	$descripcions = $anuncio_insertados[$i]->obtener_descripcion();
?>
<tr>
	  <td align="left"><input type="text" name="id_cat" id="id_cat" style="border:none"  readonly value= "<?php echo $id ?>" /></td>
      <td align="left"><input type="text" name="nombre" id="nombre" style="border:none" value="<?php echo $nombres ?>" /></td>
      <td align="left"><input type="text" name="descripcion" id="descripcion" style="border:none" value="<?php echo $descripcions ?>" /></td>
      <td> <?php echo "<a href='plantillas/eliminar_anuncio.php?nombre=$nombres'><img src='image\borrar_basura.png' height='20' width='20'></a></td>"; ?> </td>

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