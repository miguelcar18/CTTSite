<?php
include("../conexion/funciones_mysql.php");
include_once("../phpmailer/class.phpmailer.php");
include_once("../phpmailer/class.smtp.php");
$conn=conectar();

$emailobt=$_POST['email_verificar'];
$codigoobt=$_POST['codigo'];
$nuevaclave=crypt($_POST['password01'],"2A");

$stringemail="select codigo_olvido from usuario where email_usuario='".$emailobt."' and codigo_olvido='".$codigoobt."'";
$sqlemail=mysql_query($stringemail) or die ("Error en linea 8: ".mysql_error());
$cantidademail=mysql_num_rows($sqlemail);
?>
<html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Documento sin título</title>
		<link href="../css/alert.min_mensaje.css" rel="stylesheet"/>
		<link href="../css/theme.min_mensaje.css" rel="stylesheet"/>
		<script src="../js/jquery_mensaje.js"></script>
		<script src="../js/jquery-ui_mensaje.js"></script>
		<script src="../js/alert.min_mensaje.js"></script>
    </head>
    <body>

<?php
if($cantidademail == 0)
{
	 ?>
	<script>
        $(document).ready(function(){
		$.alert.open({
		title: 'ERROR',
		icon: 'error',
		content: 'Código invalido, por favor verifique.',
		callback: function() {
			history.go(-1);
			}
		});
		});
    </script>
	<?php
}
else
{
	$stringolvido="update usuario set "
                . "clave_usuario='".$nuevaclave."', codigo_olvido='' "
                . "where email_usuario= '".$emailobt."'";
    $sqlolvido=mysql_query($stringolvido) or die ("Error al actualizar los datos".mysql_error());
        ?>
       <script>
			$(document).ready(function(){
			$.alert.open({
			title: 'MENSAJE',
			icon: 'info',
			content: 'Contraseña cambiada satisfactoriamente.',
			callback: function() {
				location.href = "../index.html";
			}
		});
            });
        </script>
        <?php

        //pasar("../index.html");
	
}
?>
</body>
</html>