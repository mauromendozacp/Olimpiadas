<?php

    mysqli_report(MYSQLI_REPORT_STRICT); 
    
  	function Conectarse(){ 
       	try {
         		//Datos localhost
         		$link = mysqli_connect('localhost', 'root', '', 'arduino');

         		//Datos 000webhost
         		//$link = mysqli_connect('obmolimp.000webhostapp.com', 'id2998091_root', 'obm123', 'id2998091_arduino');
         		
       	}
       	catch (mysqli_sql_exception $e) {
            echo $e->getMessage;
         		echo "Error conectando a la base de datos!"; 
         		exit();
       	}
        return $link;
    }
    
    $link = Conectarse();

?>