<?php

include_once 'RepositorioSW.inc.php';

class ValidadorSW {

	private $aviso_inicio;
	private $aviso_cierre;

	private $nombre;
	private $descripcion;
	private $url;

	private $error_nombre;
	

	public function __construct ($nombre, $descripcion, $url,$conexion){

		$this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
		$this -> aviso_cierre = "</div>";

		$this -> nombre = "";
		$this -> descripcion = "";
		$this -> url = "";

		$this -> error_nombre = $this -> validar_nombre($conexion, $nombre, $descripcion, $url);

	}

	private function  variable_inciada($variable) {
		if (isset($variable) && !empty($variable)) {
			return true;
		} else {
			return false;
		}
	}
	

	private function validar_nombre($conexion, $nombre, $descripcion, $url) {
		/* Es el que se encarga de devolver los valores a las variables
		   Al no hacer validar_descripcion(), le pasamos aquí la variable 
		   para que meta el valor. */
		if(!$this -> variable_inciada($nombre)) {
			return "Debes escribir un nombre de usuario";
		} 

		if (strlen($nombre) <4) {
			return "El nombre tiene que tener más de 4 caracteres.";
		}
		if (strlen($nombre) >24) {
			return "El nombre tiene que tener menos de 24 caracteres.";
		}

		if (RepositorioSw :: nombre_existe ($conexion, $nombre)) {
			return "Este nombre de usuario ya está en uso. Introduce otro.";
		}
		//Nombre correcto, lo guardamos en los atributos:
		$this -> nombre = $nombre;
		$this -> descripcion = $descripcion;
		$this -> url = $url;
	}



	public function obtener_nombre() {
		return $this -> nombre;
	}
	
	public function obtener_descripcion() {
		return $this -> descripcion;
	}

	public function obtener_url() {
		return $this -> url;
	}

	public function obtener_error_nombre() {
		return $this -> error_nombre;
	}
	
	public function mostrar_nombre() {
		if ($this -> nombre !== ""){
			echo 'value="'. $this -> nombre . '"';
		}
	}

	public function mostrar_error_nombre() {
		if ($this -> error_nombre !== ""){
			echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
		}
	}

	public function registro_validO() {
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