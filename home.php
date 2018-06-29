<meta http-equiv="refresh" content="5" />

<?php 
	include("cargar-valores.php");
 ?>

<section id="sec-home">
	<div id="contenido">
		<h1 id="cont-titulo">Proyecto Arduino 2017</h1>
		<div id="datos">
			<ul>
				<li>Temperatura:
					<?php 
						echo($row[1]);
					 ?>
				</li>
				<li>Humedad: 
					<?php 
						echo($row[2]);
					 ?>
				</li>
				<li>Distancia Agua: 
					<?php 
						echo($row[3]);
					 ?>
				</li>
				<li>Sensor Luminico: 
					<?php 
						echo($row[4]);
					 ?>
				</li>
			</ul>
		</div>
	</div>

	<?php 
		/* liberar resultado */
    	mysqli_free_result($result);

		/* cerrar conexión */
		mysqli_close($link);
	 ?>
</section>