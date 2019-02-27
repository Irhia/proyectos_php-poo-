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
		<h1>Tu Chollo</h1>
		<p>Donde encontrarás anuncios chollos.</p>
	</div>
</div>

<div class="container">
	<div class="row">
		
		<div class="col-md-4">
			<div class="row">
			<div class="col-md-12">
			<!-- Como quiero se llame el panel-->
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda
					</div>
						<div class="panel-body">
							<div class="form-group">
								<input type="search" class="form-control" 	placeholder="¿Qué quieres buscar?">
							</div>
							<button class="form-control">Buscar</button>
								
							
						</div>
					</div>
				</div>
			</div>
		</div>
	
		
		<div class="col-md-8">
			
			<div class="panel panel-default">
					<div class="panel-heading">
					<a href="web_base.html"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></a> Anuncios</div>
						<div class="panel-body">
						
						 <table border="2">
    					
    						<tr> 
        				
        					<th> Categoria</th> 
        					<th colspan="25">Chollos de...</th></tr>
    						<tr>
        				
        					<td></td>
        					<td></td>
        					<td></td>
        					<td></td>
        					<td></td>
        					<td></td>
    						</tr>
 						</table>
						
						<p></p>
						</div>
							
			</div>	
							
		</div>	
</div>
</div>	

<?php
	include_once 'plantillas\documento-cierre.inc.php';

?>