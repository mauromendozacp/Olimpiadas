<section id="sec-programa">
	<div id="contenido">
		<h1 id="cont-titulo">Programa</h1>
		<div id="tabla">
			<?php
				include("conexion-bd.php");
				include("cantidad-filas.php");
			 ?>
				<table id="datos">
					<tr class="columna-datos">
						<th class="fila-datos">ID</th>
						<th class="fila-datos">Temperatura</th>
						<th class="fila-datos">Humedad</th>
						<th class="fila-datos">Distancia Agua</th>
						<th class="fila-datos">Sensor LDR</th>
						<th class="fila-datos">Fecha</th>
					</tr>
					<?php
						for ($i = 0; $i < $num_rows; $i++) {
							
							//obtener todos los datos del sensor
							$query = "SELECT * FROM `criadero-agricola`";
							
							//obtener el resultado de la consulta
							$result = mysqli_query($link, $query);

							//saltar a la fila
							mysqli_data_seek($result, $i);

							//obtener fila
						    $row = mysqli_fetch_row($result);
					 ?>
								<tr class="columna-datos">
									<th class="fila-datos"><?php echo $row[0] ?></th>
									<th class="fila-datos"><?php echo $row[1] ?></th>
									<th class="fila-datos"><?php echo $row[2] ?></th>
									<th class="fila-datos"><?php echo $row[3] ?></th>
									<th class="fila-datos"><?php echo $row[4] ?></th>
									<th class="fila-datos"><?php echo $row[5] ?></th>
								</tr>
						<?php
						}	
						 ?>
				</table>
			<?php
				/* liberar resultado */
		    	mysqli_free_result($result);

				/* cerrar conexión */
				mysqli_close($link);
			?>
		</div>
	</div>
</section>