<?php
	$server_url = "localhost";
	$usuario = "seminariousr";
	$password = "ioJ37nXhfUWBYgnP";
	$bd = "seminario_interno_2019";
	
	$con =  new mysqli($server_url, $usuario, $password, $bd);
	if (mysqli_connect_errno()) {
		die('Hubo un error: ' . mysqli_connect_error());
	}
?>