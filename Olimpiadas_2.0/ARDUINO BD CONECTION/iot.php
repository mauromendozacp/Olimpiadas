<?php
    // iot.php
    // Importamos la configuraci�n
    require("config.php");
    // Leemos los valores que nos llegan por GET
    $valor = mysqli_real_escape_string($con, $_GET['valor']);
    // Esta es la instrucci�n para insertar los valores
    $query = "INSERT INTO valores(valor) VALUES('".$valor."')";
    // Ejecutamos la instrucci�n
    mysqli_query($con, $query);
    mysqli_close($con);
?>