<?php
	$nombre_contacto=$_POST['nombre'];
	$email_contacto=$_POST['correo'];
	$telefono_contacto=$_POST['telefono'];
	$asunto_contacto=$_POST['asunto'];
	$mensaje_contacto=$_POST['mensaje'];

	$destinatario="obm.olimp@gmail.com";

	$asunto=$asunto_contacto." enviada desde http://www.Proyecto Arduino 2017.com";

	$cuerpo_mail="Nombre: ".$nombre_contacto."\r\n";
	$cuerpo_mail.="Email: ".$email_contacto."\r\n";
	$cuerpo_mail.="Telefono: ".$telefono_contacto."\r\n";
	$cuerpo_mail.="Asunto: ".$asunto_contacto."\r\n";
	$cuerpo_mail.="Mensaje: ".$mensaje_contacto;

	$remitente="From: $nombre_contacto <$email_contacto>";

	mail($destinatario, $asunto, $cuerpo_mail, $remitente);

	include('conexion-bd.php');

	mysqli_query($link, "INSERT INTO contacto VALUES (0, '$nombre_contacto', '$email_contacto', '$telefono_contacto', '$asunto_contacto', '$mensaje_contacto', NOW())");

	mysqli_close($link);

	header("Location:index.php?seccion=mensaje-enviado");
?>