<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Categoria.inc.php';
include_once 'app/RepositorioCategoria.inc.php';
include_once 'app/ValidadorCategoria.inc.php';

if (isset ($_POST['enviar'])){

	Conexion :: abrir_conexion();

	$validador = new ValidadorCategoria($_POST['nombre'],  $_POST['descripcion'],Conexion :: obtener_conexion());

	//Coge bien descripcion.

	if ($validador -> registro_valido()) {
		
		$categoria = new Categoria ('', $validador -> obtener_nombre(), $validador -> obtener_descripcion(),'');

		$categoria_insertado = RepositorioCategoria :: insertar_categoria(Conexion :: obtener_conexion(), $categoria);

	} 

	Conexion :: cerrar_conexion();
}

$titulo = 'Categoria';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>


<div class="container">
	<div class="jumbotron">
		<h1 class="text-center"> Formulario de registro </h1>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-6 text-center">
			<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					Instrucciones
				</h3>
			</div>

			<div class="panel-body">
				<br>
				<p class="text-justify">
					Introduce un nombre de categoria y una descripción. 
					<br><br><br>
					En breve podrás insertar fotos.
				</p>
				<br>

			</div>
		</div>
	</div>

	<div class="col-md-6 text-center">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					Introduce la categoría
				</h3>
		</div>

		<div class="panel-body">

			<form role="form" method="post" action=" <?php echo $_SERVER['PHP_SELF'] ?> ">

				<?php
				if (isset ($_POST['enviar'])){

					include_once 'plantillas/categoria_validado.inc.php';
				} else {
					include_once 'plantillas/categoria_vacio.inc.php';
				}

				?>

			</form>
		</div>
	</div>
</div>

<div class="col-md-12 text-center">
		<div class="panel panel-default">
			<div class="panel-heading">

				<h3 class="panel-title">
					Listado categoría
				</h3>
		</div>

		<div class="panel-body">


			<?php
			include_once 'listar_categoria.php'

			?>
		

		</div>
	</div>
</div>



<?php
	include_once 'plantillas\documento-cierre.inc.php';

?>