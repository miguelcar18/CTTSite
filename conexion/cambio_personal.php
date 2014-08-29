<link href="css/alert.min_mensaje.css" rel="stylesheet"/>
<link href="css/theme.min_mensaje.css" rel="stylesheet"/>
<script src="js/jquery_mensaje.js"></script>
<script src="js/jquery-ui_mensaje.js"></script>
<script src="js/alert.min_mensaje.js"></script>

<?php

include ("funciones_mysql.php");
conectar();

$nick_personal = $_POST['txtnick'];
$email_personal = $_POST['txtmail'];
$idioma_personal = $_POST['idioma'];
$pais_personal = $_POST['pais'];

$stringBuscar = "select nick_usuario from usuario " . "where nick_usuario='" . $nick_personal . "'";
$sqlBuscar = mysql_query($stringBuscar) or die("Error: " . mysql_error());
$cantidadBuscar = mysql_num_rows($sqlBuscar);
?>

<script>
	/*
	 var revnick = JSON.parse(localStorage.getItem('nickkey'));
	 var nickbdd = revnick.nick_usu;//miguelcar18
	 */
	var nickbdd = localStorage.nick_u;
	var nick_personal = "
<?php echo $nick_personal?>
	";
	var email_personal="
<?php echo $email_personal?>
	";
	var idioma_personal="
<?php echo $idioma_personal?>
	";
	var pais_personal="
<?php echo $pais_personal?>
	";
	var disponible="
<?php echo $cantidadBuscar ?>
	";

	var expRegEmail2=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

	if((disponible > 0) && (nickbdd != nick_personal))
	{
	$(document).ready(function(){
	$.alert.open({
	title: 'ERROR',
	icon: 'error',
	content: 'Este nick de usuario ya se encuentra registrado'
	});
	});
	}

	else if (!expRegEmail2.exec(email_personal))
	{
	$(document).ready(function(){
	$.alert.open({
	title: 'ERROR',
	icon: 'error',
	content: 'Formato de email no valido'
	});
	});
	}

	else
	{
<?php
$stringChange = "update usuario set " . "nick_usuario='" . $nick_personal . "', " . "email_usuario='" . $email_personal . "', " . "idioma_usuario='" . $idioma_personal . "', " . "pais_usuario='" . $pais_personal . "' " . "where idusuario='" . $_POST['hiddenid3'] . "'";
$mysqlChange = mysql_query($stringChange) or die("Error: " . mysql_error());
?>

	localStorage.removeItem('nick_usu');
localStorage.removeItem('email_usu');
localStorage.removeItem('idioma_usu');
localStorage.removeItem('pais_usu');

/*
var nickch = {'nick_usu' : '<?php //echo $nick_personal ?>
	'};
	var emailch = {'email_usu' : '
<?php //echo $email_personal ?>
	'};
	var idiomach = {'idioma_usu' : '
<?php //echo $idioma_personal ?>
	'};
	var paisch = {'pais_usu' : '
<?php //echo $pais_personal ?>
	'};

	localStorage.setItem('nickkey', JSON.stringify(nickch));
	localStorage.setItem('emailkey', JSON.stringify(emailch));
	localStorage.setItem('idiomakey', JSON.stringify(idiomach));
	localStorage.setItem('paiskey', JSON.stringify(paisch));

	var nickkey2 = JSON.parse(localStorage.getItem('nickkey'));
	var emailkey2 = JSON.parse(localStorage.getItem('emailkey'));
	var idiomakey2 = JSON.parse(localStorage.getItem('idiomakey'));
	var paiskey2 = JSON.parse(localStorage.getItem('paiskey'));

	*/
	localStorage.nick_usu='
<?php echo $nick_personal?>
	';
	localStorage.email_usu='
<?php echo $email_personal?>
	';
	localStorage.idioma_usu='
<?php echo $idioma_personal?>
	';
	localStorage.pais_usu='
<?php echo $pais_personal?>
	';

	var nickkey2 = localStorage.nick_usu;
	var emailkey2 = localStorage.email_usu;
	var idiomakey2 = localStorage.idioma_usu;
	var paiskey2 = localStorage.pais_usu;

	$(document).ready(function(){
	$('#txtnick').val(nickkey2);
	$('#txtmail').val(emailkey2);
	$('#lg'+idiomakey2+'').attr('selected', 'selected');
	$('#ct'+paiskey2+'').attr('selected', 'selected');
	$.alert.open({
	title: 'MENSAJE',
	icon: 'info',
	content: 'Datos modificados correctamente.'
	});
	});
	}
</script>
