<?php 

class Anuncio {
	
	
	private $id;
	private $titulo;
	private $descripcion;
	private $url;
	private $foto;
	private $p_venta;
	private $p_chollo;
	private $p_correcto;
	private $valoracion;
	private $id_usuario;
	private $id_categoria;
	private $id_sitio_web;
	
	public function __construct ($id =0,$titulo=0, $descripcion=0, $url=0, $foto=0, $p_venta=0,
	                             $p_chollo=0, $p_correcto=0, $valoracion=0, $id_usuario=0, $id_categoria=0, $id_sitio_web=0){
		
	$this-> id = $id;
	$this-> titulo = $titulo;
	$this-> descripcion = $descripcion;
	$this-> url = $url;
	$this -> foto = $foto;
	$this -> p_venta = $p_venta;
	$this -> p_chollo = $p_chollo;
	$this -> p_correcto = $p_correcto;
	$this -> valoracion = $valoracion;
	$this -> id_usuario = $id_usuario;
	$this -> id_categoria = $id_categoria;
	$this -> id_sitio_web = $id_sitio_web;
	}
	
	
	public function obtener_id(){
		return $this -> id;
	}

	public function obtener_titulo(){
		return $this -> titulo;
	}

	public function obtener_descripcion(){
		return $this -> descripcion;
	}


	public function obtener_url(){
		return $this -> url;
	}


	public function obtener_foto(){
		return $this -> foto;
	}


	public function obtener_p_venta(){
		return $this -> p_venta;
	}


	public function obtener_p_chollo(){
		return $this -> p_chollo;
	}


	public function obtener_p_correcto(){
		return $this -> p_correcto;
	}


	public function obtener_valoracion(){
		return $this -> valoracion;
	}


	public function obtener_id_usuario(){
		return $this -> id_usuario;
	}


	public function obtener_id_categoria(){
		return $this -> id_categoria;
	}


	public function obtener_id_web(){
		return $this -> id_web;
	}

	

	public function cambiar_titulo($nombre){
		$this -> nombre = $nombre;
	}

	public function cambiar_descripcion ($descripcion) {
		$this -> descripcion = $descripcion;
	}

}