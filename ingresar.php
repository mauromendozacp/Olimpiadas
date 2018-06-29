<?php 
	session_start();
	$usuario_ingreso=$_POST['usuario'];
	$clave_ingreso=$_POST['clave'];

	include('conexion-bd.php');

	$consultar_datos = mysqli_query($link, "SELECT idUsuario, Contraseña FROM usuario WHERE idUsuario = '$usuario_ingreso' AND Contraseña = '$clave_ingreso'");

	if($usuario_ingreso="admin" && $clave_ingreso="1234") {
		$_SESSION['ingreso'] = $usuario_ingreso;
		header("Location:index.php?seccion=home&ingreso=si");
	}
	else {
		header("Location:index.php?seccion=home&ingreso=no");
	}

	/*if(mysqli_num_rows($consultar_datos) == 1) {
		$_SESSION['ingreso'] = $usuario_ingreso;
		header("Location:index.php?seccion=home&ingreso=si");
	}
	else {
		header("Location:index.php?seccion=home&ingreso=no");
	}*/
?>