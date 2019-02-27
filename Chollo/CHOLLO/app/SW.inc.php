<?php
	
	class Sitios_Web {

    private $id;
	private $nombre;
	private $descripcion;
	private $url;
	
	
	public function __construct ($id=0, $nombre=0, $descripcion=0, $url=0){
		
	$this-> id=$id;
	$this-> nombre = $nombre;
	$this-> descripcion = $descripcion;
	$this -> url = $url;
	
	
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

	public function obtener_url(){
		return $this -> url;
	}

	

	public function cambiar_nombre($nombre){
		$this -> nombre = $nombre;
	}

	public function cambiar_descripcion ($descripcion) {
		$this -> descripcion = $descripcion;
	}

		public function cambiar_url ($url) {
		$this -> url = $url;
	}

}