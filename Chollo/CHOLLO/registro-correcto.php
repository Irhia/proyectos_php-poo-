<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';

if (isset($_GET['nombre']) && !empty $_GET['nombre'])) {

    echo $_GET['nombre']);
} else {
    echo 'No hay nombre';
}

if (isset($_GET['id']) && !empty $_GET['id'])) {

    echo $_GET['id']);
} else {
    echo 'No hay id';
}

?>