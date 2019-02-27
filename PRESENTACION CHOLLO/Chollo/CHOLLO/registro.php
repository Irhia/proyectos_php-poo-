<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';

if (isset ($_POST['enviar'])){

	Conexion :: abrir_conexion();


	$validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'] , Conexion :: obtener_conexion());

	if ($validador -> registro_valido()) {

		$usuario = new Usuario ('', $validador -> obtener_nombre(),
			$validador -> obtener_email(),
			password_hash($validador -> obtener_clave(), PASSWORD_DEFAULT),
			 '','');
		
		$usuario_insertado = RepositorioUsuario :: insertar_usuario(Conexion :: obtener_conexion(), $usuario);

		if ($usuario_insertado) {
			// Redireccion::redirigir(RUTA_REGISTRO_CORRECTO. '?nombre=' . $usuario -> obtener_nombre());
		}
	}

	Conexion :: cerrar_conexion();
}

$titulo = 'Registro';

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
					Introduce un nombre de usuario, tu email, y, una contraseña.

					El email que escribas deber ser auténtico ya que lo necesitarás para gestionar tu cuenta.

					Te recomendamos que uses una contraseña que contenga letras minúsculas, mayúsculas, números y símbolos.
				</p>
				<br>
					<a href="#">¿Ya tienes cuenta?</a>
				<br>
				
				<br>
					<a href="#">¿Olvistaste la contraseña?</a>
				<br>

				<br>

			</div>
		</div>
	</div>

	<div class="col-md-6 text-center">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					Introduce tus datos
				</h3>
		</div>

		<div class="panel-body">

			<form role="form" method="post" action=" <?php echo $_SERVER['PHP_SELF'] ?> ">

				<?php
				if (isset ($_POST['enviar'])){

					include_once 'plantillas/registro_validado.inc.php';
				} else {
					include_once 'plantillas/registro_vacio.inc.php';
				}

				?>

			</form>
		</div>
	</div>
</div>
</div>


<?php
	include_once 'plantillas\documento-cierre.inc.php';

?>