<?php 

include_once './app/Conexion.inc.php';
include_once './app/Categoria.inc.php';
include_once './app/RepositorioCategoria.inc.php';
include_once './app/ValidadorCategoria.inc.php';


Conexion :: abrir_conexion();

$categoria = new Categoria ();

$categoria_insertados = RepositorioCategoria :: obtener_todos(Conexion :: obtener_conexion());

?>


<select>
 <?php 
for ($i=0;$i<count($categoria_insertados);$i++)
{

	$nombres = $categoria_insertados[$i]->obtener_nombre();
	echo '<option value="'.$nombres.'">'.$nombres.'</option>';
	
?>



<?php
}
?>
    

</select>

<?php


 
Conexion :: cerrar_conexion();


?>