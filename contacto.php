<section id="sec-contacto">
	<div id="contenido">
		<h1 id="cont-titulo">Contáctanos</h1>
		<div id="formulario">
			<form method="POST" action="contacto-mensaje.php">
				<div id="row">
					<div id="cont-colum1">
						<input class="li-colum" type="text" name="nombre" placeholder="Nombre" required/>
						<input class="li-colum" type="email" name="correo" placeholder="Correo" required/>
					</div>
					<div id="cont-colum2">
						<input class="li-colum" type="tel" name="telefono" placeholder="Telefono"/>
						<input class="li-colum" type="text" name="asunto" placeholder="Asunto" required/>
					</div>
					<div id="message-form">
						<textarea id="text" name="mensaje" rows="6" placeholder="Mensaje"></textarea>
						<input id="submit" type="submit" value="Enviar mensaje"/>
					</div>
					<div style="clear: both"></div>
				</div>
			</form>
		</div>
	</div>
</section>