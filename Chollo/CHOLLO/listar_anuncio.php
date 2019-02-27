<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Anuncio.inc.php';
include_once 'app/RepositorioAnuncio.inc.php';
include_once 'app/ValidadorAnuncio.inc.php';


Conexion :: abrir_conexion();

$anuncio = new Anuncio ();

$anuncio_insertados = RepositorioAnuncio :: obtener_todos(Conexion :: obtener_conexion());

?>

<table  style="width:25%">

    <tr>
      <th>Id</th>
      <th>Título</th>
      <th>Descripción</th>
      <th>Url</th>
      <th>PVenta</th>
      <th>PChollo</th>
      <th>PCorrecto</th>
      <th>Valoración</th>
   </tr>


 <?php 
for ($i=0;$i<count($anuncio_insertados);$i++)
{
?>

	<form id="form<?php echo $i ?>" name="form1" method="post" action="#">
<?php
	$id = $anuncio_insertados[$i]->obtener_id();
	$titulo = $anuncio_insertados[$i]->obtener_titulo();
	$descripcions = $anuncio_insertados[$i]->obtener_descripcion();
  $url =  $anuncio_insertados[$i]->obtener_url();
  $p_venta =  $anuncio_insertados[$i]->obtener_p_venta();
  $p_chollo =  $anuncio_insertados[$i]->obtener_p_chollo();
  $p_correcto =  $anuncio_insertados[$i]->obtener_p_correcto();
  $valoracion =  $anuncio_insertados[$i]->obtener_valoracion();

?>
<tr>
	  <td align="left"><input type="text" name="id_an" id="id_an" style="border:none"  readonly value= "<?php echo $id ?>" /></td>
      <td align="left"><input type="text" name="titulo" id="titulo" style="border:none" value="<?php echo $titulo ?>" /></td>
      <td align="left"><input type="text" name="descripcion" id="descripcion" style="border:none" value="<?php echo $descripcions ?>" /></td>
      
      <td align="left"><input type="text" name="url" id="url" style="border:none" value="<?php echo $url ?>" /></td>
      <td align="left"><input type="text" name="p_venta" id="p_venta" style="border:none" value="<?php echo $p_venta ?>" /></td>
      <td align="left"><input type="text" name="p_chollo" id="p_chollo" style="border:none" value="<?php echo $p_chollo ?>" /></td>
      <td align="left"><input type="text" name="p_correcto" id="p_correcto" style="border:none" value="<?php echo $p_correcto ?>" /></td>
      <td align="left"><input type="text" name="valoracion" id="valoracion" style="border:none" value="<?php echo $valoracion ?>" /></td>
      <td> <?php echo "<a href='plantillas/eliminar_anuncio.php?titulo=$titulo'><img src='image\borrar_basura.png' height='20' width='20'></a></td>"; ?> </td>

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