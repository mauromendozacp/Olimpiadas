<?php 
	
	//incluir la conexion a la base de datos
	include("conexion-bd.php");

	include("cantidad-filas.php");
	$num_rows--;

	if($num_rows > 499){
		//saltar a la primera fila
		mysqli_data_seek($result, 0);

		//obtener fila
		$row_first = mysqli_fetch_row($result);
		$row_id = $row_first[0];
		$query_act = "DELETE FROM 'criadero-agricola' WHERE idAgricola='$row_id'";
		mysqli_query($link, $query_act);
	}

	//saltar a la ultima fila
	mysqli_data_seek($result, $num_rows);

	//obtener fila
    $row = mysqli_fetch_row($result);

 ?>