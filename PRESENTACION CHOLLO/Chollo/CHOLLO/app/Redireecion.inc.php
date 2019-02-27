<?php

class Redireccion {

	public static function redirigir ($url) {
		//true/false -> para indicar si quermos que se sobreescriba la dirección.
		//301 -> indica redirección
		header ('Location: ' . $url, true, 301 )
		exit();
	}
}

?>