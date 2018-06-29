<?php
  //conectamos con la base de datos
  include('conexion-bd.php');

  $temperatura=$_GET['floatTemperatura'];
  $humedad=$_GET['floatHumedad'];
  $DistanciaAgua=$_GET['longDistancia'];
  $valorLDR=$_GET['valorLDR'];


  if(mysqli_query($link, "INSERT INTO 'criadero-agricola' VALUES 
    (0, '$temperatura', '$humedad', '$DistanciaAgua', '$valorLDR', NOW());")){
    	echo"insercion correcta";
	}
	else{
		echo "ha fallado la insercion";
	}

  mysqli_close($link); //cierra la conexion

?>