<div class="form-group">
	<label>Titulo anuncio</label>
	<input type="text" class= "form-control" name="titulo" placeholder="Google">
</div>

<div class="form-group">
	<label>Descripción</label>
	<input type="text" class= "form-control" name="descripcion" placeholder="Web de búsqueda">
	
</div>

<div class="form-group">
	<label>Url</label>
	<input type="text" class= "form-control" name="url" placeholder="www.google.es">
	
</div>

<div class="form-group">
	<label>foto</label>
	<input type="text" class= "form-control" name="foto" placeholder="www.google.es\foto.png">
	
</div>
<div class="form-group">
	<label>Precio Venta</label>
	<input type="text" class= "form-control" name="p_venta" placeholder="1000€">
	
</div>
<div class="form-group">
	<label>Precio Chollo</label>
	<input type="text" class= "form-control" name="p_chollo" placeholder="750€">
	
</div>
<div class="form-group">
	<label>Precio correcto</label>
	<input type="text" class= "form-control" name="p_correcto" placeholder="875€">
	
</div>
<div class="form-group">
	<label>Valoración</label>
	<input type="text" class= "form-control" name="valoracion" placeholder="Rojo">
	
</div>

<div class="form-group">
	
	<input type="hidden" class= "form-control" name="soft" id="soft" value="">
	
</div>
<div class="form-group">
	
	<input type="hidden" class= "form-control" name="categ" id="categ" value="">
	
</div>

<br>

<div class="form-group">
<?php 


//Para introducir en la bbdd.
//$nombre_usuario = $_SESSION['nombre_usuario'];


include_once './app/Conexion.inc.php';
include_once './app/Categoria.inc.php';
include_once './app/RepositorioCategoria.inc.php';
include_once './app/ValidadorCategoria.inc.php';
include_once './app/SW.inc.php';
include_once './app/RepositorioSW.inc.php';
include_once './app/ValidadorSW.inc.php';

//Sacar las categorías
Conexion :: abrir_conexion();

$categoria = new Categoria ();
$categoria_insertados = RepositorioCategoria :: obtener_todos(Conexion :: obtener_conexion());

//Sacar los Sitios Web
$SW = new Sitios_Web ();
$sw_insertados = RepositorioSW :: obtener_todos(Conexion :: obtener_conexion());

?>

<!-- Mostrar en combox -->
<select style="width: 520px" id="cat_elegida" onchange="ShowSelected_cat();">
 <?php 
for ($i=0;$i<count($categoria_insertados);$i++)
{
	$nombres = $categoria_insertados[$i]->obtener_nombre();
	echo '<option value="'.$nombres.'">'.$nombres.'</option>';
?>

<?php
}
?>
<script>
function ShowSelected_cat() {
	
  document.getElementById("categ").value = document.getElementById("cat_elegida").value;
}
</script>

</select>
</div>
<br>

<select id= "sw_elegido" style="width: 520px" onchange="ShowSelected();">
 <?php 
for ($i=0;$i<count($sw_insertados);$i++)
{

	$nombres_sw = $sw_insertados[$i]->obtener_nombre();
	echo '<option value="'.$nombres_sw.'">'.$nombres_sw.'</option>';
?>

<?php
}
?>


</select>
</div>
<br>
<?php
Conexion :: cerrar_conexion();
?>
	


<script>
function ShowSelected() {
	
  document.getElementById("soft").value = document.getElementById("sw_elegido").value;
}
</script>

<button type="reset" class="btn btn-default btn-primary">Limpiar formulario</button>

<button type="submit" name="button" id="button" class="btn btn-default btn-primary" >Enviar datos</button>



<br>
<br>