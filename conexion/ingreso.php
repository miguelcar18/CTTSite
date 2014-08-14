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
        include("funciones_mysql.php");
        conectar();

        include_once("../phpmailer/class.phpmailer.php");
        include_once("../phpmailer/class.smtp.php");

        $nick1=$_POST['nombre_usuario'];
        $email1=$_POST['email'];
        $password1=  crypt($_POST['password1'],"2A");

        $stringingreso="insert into usuario "
                . "(nick_usuario, clave_usuario, email_usuario, enabled, hash) "
                . "values "
                . "('".$nick1."',"
                . "'".$password1."',"
                . "'".$email1."',"
                . "'0',"
                . "'".crypt($nick1,"2A")."')";
        $sqlingreso=mysql_query($stringingreso) or die ("Error al ingresar los datos".mysql_error());
        ?>
       <script>
            $(document).ready(function(){
            $.alert.open('MENSAJE','Datos ingresados correctamente. Por favor revise su correo');
            });
        </script>
        <?php
        $mensaje_correo="Por favor, valide su registro a traves del siguiente link <br><br><br>"
                . "<center>"
                . "<a href='localhost/cttsite/val_correo.php/".crypt($nick1,"2A")."' target='_blank'>"
                . "CTTSite: Validar usuario ".$nick1.""
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
        $mail->Subject="Registro a CTTSites";
        $mail->Body=$mensaje_correo;
        $mail->WordWrap=50;
        $mail->MsgHTML($mensaje_correo);
        /*$mail->AddAttachment() Adjuntar archivo*/
        $mail->Send();

        pasar("../index.html");
    ?>
    </body>
</html>
