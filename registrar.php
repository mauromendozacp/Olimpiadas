<?php
	$nombre_registro=$_POST['nombre'];
	$apellido_registro=$_POST['apellido'];
	$correo_registro=$_POST['correo'];
	$usuario_registro=$_POST['usuario'];
	$clave_registro=$_POST['clave'];
	$fecha_nacimiento_registro=$_POST['fechanacimiento'];

	include('conexion-bd.php');

	$consultar_usuario = mysqli_query($link, "SELECT idUsuario FROM usuario WHERE idUsuario = '$usuario_registro'");

	if(mysqli_num_rows($consultar_usuario) == 1) {
		header("Location:index.php?seccion=home&registro=error");
	}
	else {
		mysqli_query($link, "INSERT INTO usuario VALUES ('$usuario_registro', '$clave_registro','$nombre_registro', '$apellido_registro', '$correo_registro', '$fecha_nacimiento_registro');");
		mysqli_close($link);
		header("Location:index.php?seccion=home&registro=ok");
	}
?>