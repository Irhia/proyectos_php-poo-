<?php

include_once './../app/Conexion.inc.php';
include_once './../app/Categoria.inc.php';
include_once './../app/RepositorioCategoria.inc.php';
include_once './../app/ValidadorCategoria.inc.php';


$nombre=$_GET["nombre"];

	Conexion :: abrir_conexion();

		
			$categoria_insertado = RepositorioCategoria :: actualizar_cartegoria_enviada(Conexion :: obtener_conexion(), $nombre);


	Conexion :: cerrar_conexion();

