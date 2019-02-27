<div class="form-group">
	<label>Nombre de Categoria</label>
	<input type="text" class= "form-control" name="nombre" placeholder="Usuario" <?php  $validador -> mostrar_nombre() ?> >
	<?php $validador -> mostrar_error_nombre(); ?>

</div>

<div class="form-group">
	<label>Descripcion</label>
	<input type="text" class= "form-control" name="descripcion" placeholder="Web de búsqueda">
	
</div>

	
<button type="reset" class="btn btn-default btn-primary">Limpiar formulario</button>

<button type="submit" class="btn btn-default btn-primary" name="enviar">Enviar datos</button>