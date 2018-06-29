<?php 
	// enviar-valores.php
    // Importamos la configuración
    require("conexion-bd.php");
    // Leemos los valores que nos llegan por GET
    $gas = mysqli_real_escape_string($conectar, $_GET['gas']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO sensor(idSensor, temperatura, gas, humedad) VALUES(0, 0, '$gas', 0)";
    // Ejecutamos la instrucción
    mysqli_query($conectar, $query);
    mysqli_close($conectar);
 ?>