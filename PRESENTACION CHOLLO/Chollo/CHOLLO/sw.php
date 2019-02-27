<?php
include_once 'app/Conexion.inc.php';
include_once 'app/SW.inc.php';
include_once 'app/RepositorioSW.inc.php';
include_once 'app/ValidadorSW.inc.php';

if (isset ($_POST['enviar'])){

	Conexion :: abrir_conexion();


	$validador = new ValidadorSW($_POST['nombre'], $_POST['descripcion'], $_POST ['url'],Conexion :: obtener_conexion());



	if ($validador -> registro_valido()) {

		$sw = new Sitios_Web ('', $validador -> obtener_nombre(), $validador -> obtener_descripcion(), $validador -> obtener_url());
		
		
		$sw_insertado = RepositorioSW :: insertar_sw(Conexion :: obtener_conexion(), $sw);

		if ($sw_insertado) {
			// Redireccion::redirigir(RUTA_REGISTRO_CORRECTO. '?nombre=' . $usuario -< obtener_nombre());
		}
	}

	Conexion :: cerrar_conexion();
}

$titulo = 'Servicios Web';

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
					Introduce un nombre de Servicio Web y una descripción. 

				<br>

			</div>
		</div>
	</div>

	<div class="col-md-6 text-center">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					Introduce el nombre del Servicio Web
				</h3>
		</div>

		<div class="panel-body">

			<form role="form" method="post" action=" <?php echo $_SERVER['PHP_SELF'] ?> ">

				<?php
				if (isset ($_POST['enviar'])){

					include_once 'plantillas/sw_validado.inc.php';
				} else {
					include_once 'plantillas/sw_vacio.inc.php';
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
					Listado Sitios Web
				</h3>
		</div>

		<div class="panel-body">


			<?php
			include_once 'listar_sw.php'

			?>
		

		</div>
	</div>
</div>


<?php
	include_once 'plantillas\documento-cierre.inc.php';

?>