<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<!-- Hace que se adapte al ancho de la pantalla, con un tamaño original. -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php

	if (!isset($titulo) || empty($titulo)) {
		$titulo = 'Tu Chollo';
	}
	echo "<title>$titulo</title> ";
?>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/estilos.css" rel="stylesheet">
</head>

<body>