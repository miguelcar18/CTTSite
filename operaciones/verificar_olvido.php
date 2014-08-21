<?php
include("../conexion/funciones_mysql.php");
include_once("../phpmailer/class.phpmailer.php");
include_once("../phpmailer/class.smtp.php");
$conn=conectar();

$emailobt=$_POST['email_verificar'];

$stringemail="select email_usuario, nick_usuario from usuario where email_usuario='".$emailobt."'";
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
		content: 'Email no registrado',
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
	$campoemail=mysql_fetch_array($sqlemail);
	$nick=crypt($campoemail['nick_usuario'],"2A");
	$randomd= crypt(rand (1,1000000),"2A");
	//$randomh= crypt(rand (1,1000000),"2A");
	$codigoVerificar=$randomd.$nick;
	
	$stringolvido="update usuario set "
                . "codigo_olvido='".$codigoVerificar."' "
                . "where email_usuario= '".$_POST['email_verificar']."'";
    $sqlolvido=mysql_query($stringolvido) or die ("Error al actualizar los datos".mysql_error());
        ?>
       <script>
            $(document).ready(function(){
            $.alert.open('MENSAJE','Operacion realizada. Por favor revise su correo');
            });
        </script>
        <?php
        $mensaje_correo="Por favor, ingrese el siguiente codigo en el siguiente link<br><br><br>"
                . "<center>"
				. "Codigo: ".$codigoVerificar.""
                . "Link: <a href='".$_SERVER['HTTP_HOST']."/xcttsite/vistas/val_codigo.html' target='_blank'>"
                . "CTTSite: Validar codigo ".$nick1.""
                . "</a>"
                . "</center>";
        $mail= new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->From = "miguelcar18@gmail.com";
        $mail->AddAddress($email1);
        $mail->Username="hostcttsite01@gmail.com";
        $mail->Password="hostcttsite01/";
        $mail->Subject="Olvido de contraseña CTTSites";
        $mail->Body=$mensaje_correo;
        $mail->WordWrap=50;
        $mail->MsgHTML($mensaje_correo);
        /*$mail->AddAttachment() Adjuntar archivo*/
        $mail->Send();

        pasar("../index.html");
	
}
?>
</body>
</html>