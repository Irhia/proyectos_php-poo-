<?php
include_once '../app/Conexion.inc.php';
include_once '../app/Anuncio.inc.php';
include_once '../app/RepositorioAnuncio.inc.php';
include_once '../app/ValidadorAnuncio.inc.php';


Conexion :: abrir_conexion();

$anuncio = new Anuncio ();

$anuncio_insertados = RepositorioAnuncio :: obtener_todos_desc(Conexion :: obtener_conexion());

?>
<h1 align="center"><strong> Anuncios</strong></h1>
<br>
<br>

<table  border="1"  bordercolor="#B70306" style='width:50%' align="center" bgcolor="#F5F0F0">

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
  $foto = $anuncio_insertados[$i] -> obtener_foto();
  $url =  $anuncio_insertados[$i]->obtener_url();
  $p_venta =  $anuncio_insertados[$i]->obtener_p_venta();
  $p_chollo =  $anuncio_insertados[$i]->obtener_p_chollo();
  $p_correcto =  $anuncio_insertados[$i]->obtener_p_correcto();
  $valoracion =  $anuncio_insertados[$i]->obtener_valoracion();

/*
if ($valoracion = 'verde'){
    $color = '#42a453';
  } else if ($valoracion = 'rojo') {
            $color = '#f52e0f';
          }
          else {$color = '#f1ea13';}

echo $color;

*/
?>

<tr align="center">
	  <td align="center"><input type="text" name="id_an" id="id_an" style="border:none"  readonly value= "<?php echo $id ?>" /></td>
      <td><input type="text" name="titulo" id="titulo" style="border:none" value="<?php echo $titulo ?>" /></td>
      <td ><input type="text" name="descripcion" id="descripcion" style="border:none" value="<?php echo $descripcions ?>" /></td>
      <td><a href="<?php echo $url; ?>" target="_blank"><img src="<?php echo $foto; ?>" width="100" height="100"></a></td>
      <td><input type="text" name="p_venta" id="p_venta" style="border:none" value="<?php echo $p_venta ?>" /></td>
      <td><input type="text" name="p_chollo" id="p_chollo" style="border:none" value="<?php echo $p_chollo ?>" /></td>
      <td><input type="text"name="p_correcto" id="p_correcto" style="border:none" value="<?php echo $p_correcto ?>" /></td>
      <td><input type="text" name="valoracion" id="valoracion" style="border:none"  style="color: <? echo $color; ?>" value="<?php echo $valoracion ?>" /></td>
      </td>

 </tr>
 	  </form>  
 	  	

<?php
}
?>
    

</table>

<?php


 
Conexion :: cerrar_conexion();


?>