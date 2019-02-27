<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

$titulo = 'Tu Chollo';

include_once 'plantillas/documento-declaracion.inc.php';

?>

<br>
<br>

<div class="container">
	<div class="jumbotron">
		<h1 class="text-center"> Eliminar registro </h1>
	</div>
</div>



	<div class="col-md-12 text-center">
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
					include_once 'plantillas/categoria_ELIMINAR_vacio.inc.php';
				}

				?>

			</form>
		</div>
	</div>
</div>



<?php
	include_once 'plantillas\documento-cierre.inc.php';

?>