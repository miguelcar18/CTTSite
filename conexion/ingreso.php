<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Documento sin título</title>
		<link href="../css/alert.min_mensaje.css" rel="stylesheet"/>
		<link href="../css/theme.min_mensaje.css" rel="stylesheet"/>
		<script src="../js/jquery_mensaje.js"></script>
		<script src="../js/jquery-ui_mensaje.js"></script>
		<script src="../js/alert.min_mensaje.js"></script>
	</head>
	<body>

		<?php
		include ("funciones_mysql.php");
		conectar();

		include_once ("../phpmailer/class.phpmailer.php");
		include_once ("../phpmailer/class.smtp.php");

		$nick1 = $_POST['nombre_usuario'];
		$email1 = $_POST['email'];
		$password1 = crypt($_POST['password1'], "2A");
		$pais = $_POST['pais'];
		$idioma = $_POST['idioma'];

		$stringingreso = "insert into usuario " . "(nick_usuario, clave_usuario, email_usuario, enabled, hash, idioma_usuario, pais_usuario) " . "values " . "('" . $nick1 . "'," . "'" . $password1 . "'," . "'" . $email1 . "'," . "'0'," . "'" . crypt($nick1, "2A") . "'," . "'" . $idioma . "'," . "'" . $pais . "')";

		$sqlingreso = mysql_query($stringingreso) or die("Error al ingresar los datos" . mysql_error());

		$stringIdUsuario = "select idusuario from usuario " . "where nick_usuario='" . $nick1 . "'";
		$sqlIdUsuario = mysql_query($stringIdUsuario) or die("Error: " . mysql_error());
		$campoIdUsuario = mysql_fetch_array($sqlIdUsuario);

		$stringOpcionValues = "select idctt_opciones, desc_opcion, data_type " . "from ctt_opciones " . "where desc_opcion='Nombre' " . "or " . "desc_opcion='Apellido'";

		$sqlOpcionValues = mysql_query($stringOpcionValues) or die("Error al ingresar los datos" . mysql_error());
		$cantidadOpcionValues = mysql_num_rows($sqlOpcionValues);

		for ($na = 1; $na <= $cantidadOpcionValues; $na++) {
			$campoOpcionValues = mysql_fetch_array($sqlOpcionValues);
			$idna = $campoOpcionValues['idctt_opciones'];
			$valuena = $campoOpcionValues['desc_opcion'];
			if ($valuena == 'Nombre') {
				$valorna = $_POST['nombre'];
			} else if ($valuena == 'Apellido') {
				$valorna = $_POST['apellido'];
			}
			$typena = $campoOpcionValues['data_type'];

			$stringna = "insert into ctt_options_values " . "(idOpcion, value, type, usuario_idusuario) " . "values " . "('" . $idna . "', '" . $valorna . "', '" . $typena . "', '" . $campoIdUsuario['idusuario'] . "')";
			$sqlna = mysql_query($stringna) or die("Error al ingresar los datos: " . mysql_error());
		}
		$mensaje_correo = "Por favor, valide su registro a traves del siguiente link <br><br><br>" . "<center>" . "<a href='" . $_SERVER['HTTP_HOST'] . "/xcttsite/val_correo.php?" . crypt($nick1, "2A") . "' target='_blank'>" . "CTTSite: Validar usuario " . $nick1 . "" . "</a>" . "</center>";
		$mail = new PHPMailer();
		$mail -> IsSMTP();
		$mail -> SMTPAuth = true;
		$mail -> SMTPSecure = "ssl";
		$mail -> Host = "smtp.gmail.com";
		$mail -> Port = 465;
		$mail -> From = "miguelcar18@gmail.com";
		$mail -> AddAddress($email1);
		$mail -> Username = "hostcttsite01@gmail.com";
		$mail -> Password = "hostcttsite01/";
		$mail -> Subject = "Registro a CTTSites";
		$mail -> Body = $mensaje_correo;
		$mail -> WordWrap = 50;
		$mail -> MsgHTML($mensaje_correo);
		/*$mail->AddAttachment() Adjuntar archivo*/
		$mail -> Send();
	?>
		<script>
			$(document).ready(function() {

				$.alert.open({
					title : 'MENSAJE',
					icon : 'info',
					content : 'Datos ingresados correctamente. Por favor revise su correo.',
					callback : function() {
						location.href = "../index.html";
					}
				});

			});
		</script>
	</body>
</html>
