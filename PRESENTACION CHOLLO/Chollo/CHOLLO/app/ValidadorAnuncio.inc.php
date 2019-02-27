<?php

include_once 'RepositorioAnuncio.inc.php';

class ValidadorAnuncio {

	private $aviso_inicio;
	private $aviso_cierre;

	private $titulo;
	private $descripcion;

	private $error_titulo;
	//private $error_descripcion;

	public function __construct ($titulo, $descripcion=0, $conexion){

		$this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
		$this -> aviso_cierre = "</div>";

		$this -> titulo = "";
		$this -> descripcion = "";


		$this -> error_titulo = $this -> validar_titulo($conexion, $titulo, $descripcion);
		//$this -> error_descripcion = $this -> validar_descripcion ($conexion, $descripcion);
	}
	

	

	private function  variable_inciada($variable) {
		if (isset($variable) && !empty($variable)) {
			return true;
		} else {
			return false;
		}
	}
	

	private function validar_titulo($conexion, $titulo,$descripcion) {
		if(!$this -> variable_inciada($titulo)) {
			return "Debes escribir un titulo de anuncio";
		} 

		if (strlen($titulo) <4) {
			return "El titulo tiene que tener más de 4 caracteres.";
		}
		if (strlen($titulo) >24) {
			return "El titulo tiene que tener menos de 24 caracteres.";
		}

		if (RepositorioAnuncio :: titulo_hay ($conexion, $titulo)) {
			return "Este titulo de anuncio ya está en uso. Introduce otro.";
		}
		//titulo correcto, lo guardamos en los atributos:
		$this -> titulo = $titulo;
		$this -> descripcion = $descripcion;
	}


	public function obtener_titulo() {
		return $this -> titulo;
	}
	
	public function obtener_descripcion() {
		return $this -> descripcion;
	}

	public function obtener_error_titulo() {
		return $this -> error_titulo;
	}
	

	public function obtener_error_descripcion() {
		return $this -> error_descripcion;
	}

	public function mostrar_titulo() {
		if ($this -> titulo !== ""){
			echo 'value="'. $this -> titulo . '"';
		}
	}

	public function mostrar_descripcion() {
		if ($this -> descripcion !== ""){
			echo 'value="'. $this -> descripcion . '"';
		}
	}

	public function mostrar_error_titulo() {
		if ($this -> error_titulo !== ""){
			echo $this -> aviso_inicio . $this -> error_titulo . $this -> aviso_cierre;
		}
	}

	
	public function mostrar_error_descripcion() {
		if ($this -> error_descripcion !== ""){
			echo $this -> aviso_inicio . $this -> error_descripcion . $this -> aviso_cierre;
		}
	}

	public function registro_valido() {
		// && $this -> error_descripcion === ""
		if ($this -> error_titulo == "") {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
	}
}

?>






