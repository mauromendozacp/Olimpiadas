<?php
	//conexion-bd.php
    // Credenciales
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "arduino";

	$conectar = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	//datos 000webhost
	//$conectar = mysqli_connect('mysql.hostinger.com.ar', 'u233290110_mauro', '141414lol', 'u233290110_webhw');

	if (mysqli_connect_errno($conectar)) {
		Serial.print("ERROR, no se pudo conectar").mysql_connect_error();
	}
?>