<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Categoria.inc.php';
include_once 'app/RepositorioCategoria.inc.php';
include_once 'app/ValidadorCategoria.inc.php';
include_once 'app/ControlSesion.inc.php';


Conexion :: abrir_conexion();


	$validador = new ValidadorCategoria($_GET['nombre'], $_GET['descripcion'], Conexion :: obtener_conexion());

	$cambio_efectuado = RepositorioCategoria :: actualizar_entrada(Conexion :: obtener_conexion(),
				$_GET['nombre'], $validador -> obtener_nombre());

			//if ($cambio_efectuado) {
				//echo 'ENTRADA VÁLIDA Y GUARDADA';
				//Redireccion :: redirigir(RUTA_GESTOR_ENTRADAS);

$titulo = "Editar entrada";

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Editar entrada</h1>
    </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form role="form" method="post" action=" <?php echo $_SERVER['PHP_SELF'] ?> ">

				<?php
				Conexion :: abrir_conexion();

$categoria = new Categoria ();

$categoria_insertado = RepositorioCategoria :: obtener_todos(Conexion :: obtener_conexion());

	echo "<table style='width:100%' >";
	echo "<tr align='left'>";
	echo "<th>Nombre</th>";
	echo"<th> Descripcion</th>";
	echo "</tr>";

for ($i=0;$i<count($categoria_insertado);$i++)

{	

	$nombre=$categoria_insertado[$i]->obtener_nombre();
	$descripcion=$categoria_insertado[$i]->obtener_descripcion();
	echo "<tr align='left'>";
	echo "<td>$nombre</td>";
	echo "<td>$nombre</td>";
	echo "<td>";
	echo "<a href='plantillas/eliminar_categoria.php?nombre=$nombre'><img src='image\borrar_basura.png' height='20' width='20'></a>";
	echo "<a href='plantillas/actualizar_categoria.php?nombre=$nombre'><img src='image\aa.png' height='20' width='20'></a></td>";
	echo "</tr>";
 }

echo "</table>";


 
Conexion :: cerrar_conexion();


?>
				?>

			</form>
		</div>
	</div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>