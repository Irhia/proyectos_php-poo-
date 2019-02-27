<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/config.inc.php';


Conexion :: abrir_conexion();

//$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());
?>
<!-- 

navbar navbar-default: Clase de navegación de boostrap básica
navbar-static-top: hace que la barra de navegación sea fija, aunque nos movamos hacia abaho, estará visible.
-->
<nav class="navbar navbar-default navbar-static-top" > 
<!-- Se suele usar para hacer barras de navegación. -->

	<!-- Va a contener el titular de la barra de navegación.  -->
	<!--Container fluid ocupa todo el ancho de la ventana-->
	<div class="container">
	
	<div class="navbar-header">
	
	<!-- Le hemos indicado que será button con lo cuál no hará nada (lo haré por java), no es como submit.-->
	<!-- Si la barra no cabe en la pantalla sldrá este botón para poder desplegarla-->
	<!-- data-target es para indicarle quién es el botón que tiene que expandir o colapasar, le pasasmo el id de: <div id="navbar" class="navbar-collapse collapse">--> 
	<!-- data-target es para indicarle quién es el botón que tiene que expandir o colapasar, le pasasmo el id de: <div id="navbar" class="navbar-collapse collapse">--> 
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	
	<!-- Grupo de texto que van en una línea- -->
	<!-- sr-only: para personas invidentes-->
	<span class="sr-only"> Este botón despiegla la barra de navegación. </span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	
		
	</button>
	
	<!-- Logotipo de la barra de navegación
	Aquí pondriamos nuestro LOGO DE EMPRESA.-->
	<a class="navbar-brand" href="#">MisAnuncios</a>
	</div>
	
	<!-- Este id lo llama el botón que hará que sean desplegables al reducir la página a tamaño menor., simulando un móvil por ejemplo.-->
	<div id="navbar" class="navbar-collapse collapse">
	<!-- Esta clase hace que la barra tenga muchas opciones-->
		<ul class="nav navbar-nav">
		  <li> <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuario</a></li>
		  <li> <a href="anuncios.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Anuncios</a></li>
		  <li><a href="sw.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Servicios Web</a></li>
		  <li> <a href="categoria.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Categorías</a></li>
		</ul>	
		
	  <ul class="nav navbar-nav navbar-right">
	  	<!-- Si el usuario ha iniciado sesión, se verán unas opciones. -->
	  	 <?php
            if (ControlSesion::sesion_iniciada()) {
         ?>

         <li>
         	<a href="#">
         		<span class="glyphicon glyphicon-user" aria-hidden="true">
				</span>

				<?php echo '' . $_SESSION['nombre_usuario']; ?>
			</a>
		</li>

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

				
			<span class="glyphicon glyphicon-dashboard" aria-hidden="true"> </span> Categoria <span class="caret"></span>
			</a>
			
				<ul class="dropdown-menu">
					<li>
						<a href="#">
							Insertar
						</a>
					</li>

					<li>
						<a href="#">
							Actualizar
						</a>
					</li>

					<li>
						<a href="#">
							Eliminar
						</a>
					</li>

			
				</ul>
		</li>
		
		<li>

		//header('Location: http://localhost/chollo/chollo/logout.php');          
	
			<a href="#">
       			<span class="glyphicon glyphicon-log-out" aria-hidden="true">
				</span> Cerrar sesión. 
			</a>
		</li>

         <?php

     		} else {
     	 ?>


	  <li>
        <a href="#">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
            <?php
           // echo $total_usuarios;
            ?>
        </a>
      </li>
      
      <li>
	  <a href="login.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Iniciar sesión
	 </a></li>
	
	<li> <a href="registro.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Registro
	</a></li>

     	 <?php

     		}
         ?>

	  
	</ul>
	</div>
	
	</div>
	
</nav>