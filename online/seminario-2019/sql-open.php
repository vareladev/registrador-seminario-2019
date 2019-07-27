<?php
	$server_url = "localhost";
	$usuario = "";
	$password = "";
	$bd = "";
	
	$con =  new mysqli($server_url, $usuario, $password, $bd);
	if (mysqli_connect_errno()) {
		die('Hubo un error: ' . mysqli_connect_error());
	}
?>