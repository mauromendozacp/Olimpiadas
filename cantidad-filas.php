<?php 
	//obtener todos los datos del sensor
	$query = "SELECT * FROM `criadero-agricola`";
	
	//obtener el resultado de la consulta
	$result = mysqli_query($link, $query);

	//obtener el numero de filar
	$num_rows = mysqli_num_rows($result);
 ?>