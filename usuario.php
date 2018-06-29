<section id="sec-usuario">
	<div id="contenido">
		<h1 id="cont-titulo">Usuario</h1>
		<div id="f-ing">
	    	<h3>Ingresar</h3>
	        <form method="POST" action="ingresar.php">
			    <?php
			    if (isset($_GET['ingreso'])) {
			        echo "<h5> Los datos ingresado son incorrectos </h5>";
			    }
			    ?>
	            <ul class="f-list">
	                <li><span>Usuario: </span><input type="text" name="usuario" required></li>
	                <li><span>Contraseña: </span><input type="password" name="clave" required></li>
	                <li id="sub-ing"><input type="submit" value="Ingresar"></li>
	            </ul>
	        </form>
	    </div>
	    <div id="f-reg">
	    	<h3>Registrarme</h3>
	        <?php
	        if (isset($_GET['registro'])) {
	            if ($_GET['registro']=='ok') {
	                echo "<h5> El usuario se registró correctamente </h5>";
	            }
	            else {
	                echo "<h5> El nombre de usuario seleccionado ya esta en uso </h5>";
	            }
	        }
	        ?>
	        <form method="POST" action="registrar.php">
	            <ul class="f-list">
	                <li><span>Nombre: </span><input type="text" name="nombre" required></li>
	                <li><span>Apellido: </span><input type="text" name="apellido" required></li>
	                <li><span>Email: </span><input type="email" name="correo" required></li>
	                <li><span>Fecha Nacimiento: </span><input type="date" name="fechanacimiento" required></li>
	                <li><span>Usuario: </span><input type="text" name="usuario" required></li>
	                <li><span>Contraseña: </span><input type="password" name="clave" required></li>
	                <li id="sub-reg"><input type="submit" value="Registrarme"></li>
	            </ul>   
	        </form>
	    </div>
	</div>
</section>