<div class="form-group">
	<label>Nombre de Servicio Web</label>
	<input type="text" class= "form-control" name="nombre" placeholder="Google"
	<?php  $validador -> mostrar_nombre() ?> >
	<?php $validador -> mostrar_error_nombre(); ?>


</div>

<div class="form-group">
	<label>Descripción</label>
	<input type="text" class= "form-control" name="descripcion" placeholder="Web de búsqueda">
	
</div>

<div class="form-group">
	<label>Url</label>
	<input type="text" class= "form-control" name="url" placeholder="www.google.es">
	
</div>

	
<button type="reset" class="btn btn-default btn-primary">Limpiar formulario</button>

<button type="submit" class="btn btn-default btn-primary" name="enviar">Enviar datos</button>