<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Categoria.inc.php';
include_once 'app/RepositorioCategoria.inc.php';
include_once 'app/ValidadorCategoria.inc.php';


Conexion :: abrir_conexion();

$categoria = new Categoria ();

$categoria_insertados = RepositorioCategoria :: obtener_todos(Conexion :: obtener_conexion());

?>

<table  style="width:100%">

    <tr>
      <th>Id categoría</th>
      <th>Nombre</th>
      <th>Descripción</th>
     </tr>


 <?php 
for ($i=0;$i<count($categoria_insertados);$i++)
{
?>

	<form id="form<?php echo $i ?>" name="form1" method="post" action="plantillas/update_categoria.php">
<?php
	$id = $categoria_insertados[$i]->obtener_id();
	$nombres = $categoria_insertados[$i]->obtener_nombre();
	$descripcions = $categoria_insertados[$i]->obtener_descripcion();
?>
<tr>
	  <td align="left"><input type="text" name="id_cat" id="id_cat" style="border:none"  readonly value= "<?php echo $id ?>" /></td>
      <td align="left"><input type="text" name="nombre" id="nombre" style="border:none" value="<?php echo $nombres ?>" /></td>
      <td align="left"><input type="text" name="descripcion" id="descripcion" style="border:none" value="<?php echo $descripcions ?>" /></td>
      <td> <?php echo "<a href='plantillas/eliminar_categoria.php?nombre=$nombres'><img src='image\borrar_basura.png' height='20' width='20'></a></td>"; ?> </td>

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