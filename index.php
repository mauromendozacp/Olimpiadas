<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Arduino</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	
	<link href="images/cp.ico" rel="shortcut icon"/>
	<?php
		$seccion = isset($_GET['seccion'])? $_GET['seccion'] : 'home';
	?>
</head>
<body>

	<section id="pagina">
		<header id="home">
			<div id="main-nav">
				<div id="contenedor">
					<div id="logo-inicio">
						<a href="index.php?seccion=home"><img width="125px" height="125px" src="images/cp.png"></a>
					</div>
					<nav id="nav">
						<div id="botonera-nav">
							<ul>
								<li class="sec-boton"><a href="index.php?seccion=equipo">Equipo</a></li>
								<li class="sec-boton"><a href="index.php?seccion=programa">Programa</a></li>
								<li class="sec-boton"><a href="index.php?seccion=contacto">Contacto</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			
		</header>

		<section id="sec-contenido">
			<?php
				if (isset($_SESSION['ingreso'])){
					
					function Cuenta(){
						if($_SESSION['ingreso'] = 'admin'){
							return true;
						}
						return false;
					}
					?>
					<div id="cont-cuenta">
						<div id="usuario-cuenta">
							<h3>Usuario: <?php echo $_SESSION['ingreso'] ?></h3>
						</div>
						<div id="estado-cuenta">
							<h3>status:
								<?php 
									if(Cuenta()){
										echo "Adiministrador";
									}
									else{
										echo "Cliente";
									}
								 ?>
							</h3>
						</div>
					</div>
					<?php
					if(Cuenta()){
						?>
						<div id="adiministrador">
							
						</div>
					<?php
					}
					else{
						?>
						<div id="cliente">
							
						</div>
					<?php
					}

					switch($seccion){
						case 'home':
						case 'equipo':
						case 'programa':
						case 'contacto':
						case 'mensaje-enviado':
							include(''.$seccion.'.php');
						break;
						default:
							include('home.php');
							break;
					}
				}
				else{
					include('usuario.php');
				}
			?>
		</section>

		<footer id="foot">
			<div id="pie-info">
				<ul>
					<li>
						<div class="img-icon"><a href="#" target="_new"><img src="images/tel-icon.png"></a></div>
						<p><span>15-11112222</span></p>
					</li>
					<li>
						<div class="img-icon"><a href="index.php?seccion=contacto" target="_new"><img src="images/gmail-icon.png"></a></div>
						<p><span>obm.olimp@gmai.com</span></p>
					</li>
					<li>
						<div class="img-icon"><a href="https://www.google.com.ar/maps"><img src="images/dir-icon.png"></a></div>
						<p><span>OBM Company</span></p>
					</li>
				</ul>
			</div>
		</footer>
	</section>

</body>
</html>