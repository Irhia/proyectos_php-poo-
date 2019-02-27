<?php 

class Categoria {
	
	
	private $id;
	private $nombre;
	private $descripcion;
	private $activo;
	
	public function __construct ($id =0,$nombre=0, $descripcion=0, $activo=0){
		
	$this-> id=$id;
	$this-> nombre = $nombre;
	$this-> descripcion = $descripcion;
	$this-> activo = $activo;
	
	}
	
	
	public function obtener_id(){
		return $this -> id;
	}

	public function obtener_nombre(){
		return $this -> nombre;
	}

	public function obtener_descripcion(){
		return $this -> descripcion;
	}

	public function esta_activo(){
		return $this -> activo;
	}

	public function cambiar_nombre($nombre){
		$this -> nombre = $nombre;
	}

	public function cambiar_descripcion ($descripcion) {
		$this -> descripcion = $descripcion;
	}

}