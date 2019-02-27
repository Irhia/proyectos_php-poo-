<?php

include_once 'RepositorioCategoria.inc.php';

class ValidadorCategoria {

	private $aviso_inicio;
	private $aviso_cierre;

	private $nombre;
	private $descripcion;

	private $error_nombre;
	//private $error_descripcion;

	public function __construct ($nombre, $descripcion=0, $conexion){

		$this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
		$this -> aviso_cierre = "</div>";

		$this -> nombre = "";
		$this -> descripcion = "";


		$this -> error_nombre = $this -> validar_nombre($conexion, $nombre, $descripcion);
		//$this -> error_descripcion = $this -> validar_descripcion ($conexion, $descripcion);
	}
	

	

	private function  variable_inciada($variable) {
		if (isset($variable) && !empty($variable)) {
			return true;
		} else {
			return false;
		}
	}
	

	private function validar_nombre($conexion, $nombre,$descripcion) {
		if(!$this -> variable_inciada($nombre)) {
			return "Debes escribir un nombre de usuario";
		} 

		if (strlen($nombre) <4) {
			return "El nombre tiene que tener más de 4 caracteres.";
		}
		if (strlen($nombre) >24) {
			return "El nombre tiene que tener menos de 24 caracteres.";
		}

		if (RepositorioCategoria :: nombre_existe ($conexion, $nombre)) {
			return "Este nombre de usuario ya está en uso. Introduce otro.";
		}
		//Nombre correcto, lo guardamos en los atributos:
		$this -> nombre = $nombre;
		$this -> descripcion = $descripcion;
	}
/*
	private function validar_descripcion($conexion, $descripcion) {
		if(!$this -> variable_inciada($descripcion)) {
			return "Debes escribir una descripcion";
		} else {
			$this -> descripcion = $descripcion;
		}


	}
*/

	public function obtener_nombre() {
		return $this -> nombre;
	}
	
	public function obtener_descripcion() {
		return $this -> descripcion;
	}

	public function obtener_error_nombre() {
		return $this -> error_nombre;
	}
	

	public function obtener_error_descripcion() {
		return $this -> error_descripcion;
	}

	public function mostrar_nombre() {
		if ($this -> nombre !== ""){
			echo 'value="'. $this -> nombre . '"';
		}
	}

	public function mostrar_descripcion() {
		if ($this -> descripcion !== ""){
			echo 'value="'. $this -> descripcion . '"';
		}
	}

	public function mostrar_error_nombre() {
		if ($this -> error_nombre !== ""){
			echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
		}
	}

	
	public function mostrar_error_descripcion() {
		if ($this -> error_descripcion !== ""){
			echo $this -> aviso_inicio . $this -> error_descripcion . $this -> aviso_cierre;
		}
	}

	public function registro_valido() {
		// && $this -> error_descripcion === ""
		if ($this -> error_nombre == "") {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
	}
}

?>