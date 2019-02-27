<?php

include_once 'app/Conexion.inc.php';
include_once 'app/Anuncio.inc.php';
include_once 'app/RepositorioAnuncio.inc.php';
include_once 'app/ValidadorAnuncio.inc.php';
include_once 'app/Categoria.inc.php';
include_once 'app/RepositorioCategoria.inc.php';
include_once 'app/SW.inc.php';
include_once 'app/RepositorioSW.inc.php';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';



if (isset ($_POST['button'])){

	$nom_categoria = $_POST['categ'];
	$nom_sw = $_POST['soft'];
	//$usuario = $_SESSION['nombre_usuario'];
			
	Conexion :: abrir_conexion();

	$categoria = new Categoria ();
	$categoria_insertados = RepositorioCategoria :: obtener_categoria_por_nombre(Conexion :: obtener_conexion(), $nom_categoria);
	//RECOGE EL ID CATEGORIA (sÓLO DEVIUELVE UN ARRAY DE 1);	

	$id_categoria = $categoria_insertados->obtener_id();

	$sw = new Sitios_Web ();
	$sw_insertados = RepositorioSW :: obtener_sw_por_nombre(Conexion :: obtener_conexion(), $nom_sw);
	$id_soft =  $sw_insertados->obtener_id();
	print_r($id_soft);

$titulo = 'Anuncio';


$validador = new ValidadorAnuncio($_POST['titulo'], $_POST['descripcion'], Conexion :: obtener_conexion());

	if ($validador -> registro_valido()) {

	

		
	
		$anuncio = new Anuncio ($validador -> obtener_titulo(), $validador -> obtener_descripcion(),'');

		$anuncio_insertado = RepositorioAnuncio :: insertar_anuncio(Conexion :: obtener_conexion(), $anuncio, $usuario, $id_categoria, $id_soft);

	} 
	else 
		{echo "no hace nada"; exit;}
	Conexion :: cerrar_conexion();
}

	
?>


<div class="container">
	<div class="jumbotron">
		<h1 class="text-center"> Formulario de registro </h1>
	</div>
</div>

<div class="container">
	<div class="row">
	<div class="col-md-12 text-center">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					Introduce un anuncio
				</h3>
		</div>

		<div class="panel-body">

			<form name="form_anuncio" role="form" method="post" action=" <?php echo $_SERVER['PHP_SELF'] ?> ">

				<?php
				if (!isset ($_POST['enviar'])){
				include_once 'plantillas/anuncio_vacio.inc.php';
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
					Listado anuncios
				</h3>
		</div>

		<div class="panel-body">


			<?php
			include_once 'listar_anuncio.php';

			?>
		

		</div>
	</div>
</div>
</div>
</div>



<?php
	include_once 'plantillas/documento-cierre.inc.php';

?>