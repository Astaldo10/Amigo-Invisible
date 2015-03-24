<!DOCTYPE html5>
<html>
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
		<title>Amigo Invisible</title>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href = "style.css" rel = "stylesheet">
	</head>
	<body>
		<div id = "div-titulo" class = "margen-top">
			<p id = "titulo" align = "center">AMIGO INVISIBLE 2.014</p>
		</div>
		<p id = "descripción" align = "center">¡Introduce tu usuario, tu contraseña y tu amigo invisible para que puedas recordarlo más tarde desde tu móvil!</p>
		<form action = "amigo.php" method = "POST" align = "center">
			<input class = "input" name = "user" type = "text" placeholder = "Nombre" /><br>
			<input class = "input"name = "pass" type = "password" placeholder = "Contraseña" /><br>
			<input class = "input"name = "conf-pass" type = "password" placeholder = "Repetir la contraseña" /><br>
			<input class = "input"name = "friend" type = "password" placeholder = "Amigo Invisible" /><br>
			<input class = "submit" value = "¡Registrar!" type = "submit"><br>

			<?php

				$msg = "";

				if (isset($_GET["code"]) && is_numeric($_GET["code"])) {

					switch ($_GET["code"]) {
						case 0:
							$msg = "¡Se ha registrado correctamente!";
							break;

						case 1:
							$msg = "Usted ya se ha registrado previamente.";
							break;

						case 2:
							$msg = "El nombre o la contraseña son erróneos.";
							break;
						
						case 3:
							$msg = "Hay campos vacíos.";
							break;

						case 4:
							$msg = "Las contraseñas no coinciden.";
							break;

						default:
							$msg = "";
							break;
					}
				}
			?>

			<p id = "error"><?= $msg ?></p>

		</form>
		<div class = "pie">
			<div class = "container">
				<p id = "mensaje-pie" align = "center">¡Feliz Navidad y Próspero Año Nuevo 2.015!<p id = "submensaje-pie" align = "center">Grupo Universitario de Informática, UVa</p>
			</div>
		</div>
	</body>
</html>
