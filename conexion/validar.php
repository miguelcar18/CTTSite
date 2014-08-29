<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Documento sin t�tulo</title>
		<link href="../css/alert.min_mensaje.css" rel="stylesheet"/>
		<link href="../css/theme.min_mensaje.css" rel="stylesheet"/>
		<script src="../js/jquery_mensaje.js"></script>
		<script src="../js/jquery-ui_mensaje.js"></script>
		<script src="../js/alert.min_mensaje.js"></script>
	</head>
	<body>

		<?php
            include("funciones_mysql.php");
            include("../operaciones/funciones.php");
            $conn=conectar();
            
            $ew = obtenerNavegadorWeb();
            $navegador = $ew['nombre'];
            
            $stringbna="select * from ctt_opciones "
            . "where desc_opcion='Nombre' "
            . "or desc_opcion='Apellido'";
            $sqlbna=mysql_query($stringbna) or die("Error: ".mysql_error());
            
            if (!empty($_POST['nick']) && !empty($_POST['password']))
            {
                $usu=$_POST['nick'];
                $clav=crypt($_POST['password'],"2A");
                $STRINGINGRESO="select * from usuario where nick_usuario='".$usu."'";
                $SQLINGRESO=mysql_query($STRINGINGRESO);
                $FILASINGRESO=mysql_num_rows($SQLINGRESO);

                if($FILASINGRESO==1)
                {
                    for($is=1;$is<=$FILASINGRESO;$is++)
                    {
                        $rs=mysql_fetch_array($SQLINGRESO);
                        $id_usuario=$rs['idusuario'];
                        $nick_usuario=$rs['nick_usuario'];
                        $clave_usuario=$rs['clave_usuario'];
                        $email_usuario=$rs['email_usuario'];
                        $idioma_usuario=$rs['idioma_usuario'];
                        $pais_usuario=$rs['pais_usuario'];
                        $habilitado=$rs['enabled'];
                        if($clav==$clave_usuario && $habilitado==0)
                        {

		?>
		<script>
			$(document).ready(function() {
				$.alert.open({
					title : 'ADVERTENCIA',
					icon : 'warning',
					content : 'Por favor, revise su correo electronico y valide su registro.',
					callback : function() {
						history.go(-1);
					}
				});
			});
		</script>
		<?php
		}

		else if($clav==$clave_usuario && $habilitado==1)
		{
		$idnombre="";
		$idapellido="";
		for($bna=1; $bna<=2; $bna++)
		{
		$campobna=mysql_fetch_array($sqlbna);
		$idbna=$campobna['idctt_opciones'];
		$descbna=$campobna['desc_opcion'];
		if($descbna=='Nombre')
		{
		$idnombre.=$idbna;
		}
		else if($descbna=='Apellido')
		{
		$idapellido.=$idbna;
		}
		}

		$stringrsesion="insert into ctt_usuarios_sesiones "
		. "("
		. "idusuario_sesion, so_sesion, navegador_sesion, fecha_sesion"
		. ") values "
		. "("
		. "'".$id_usuario."', '".php_uname('s')."', '".$navegador."', now()"
		. ")";
		$sqlrsesion=mysql_query($stringrsesion) or die ("Error en la linea 63: ".mysql_error());
		$stringcaja="select * from ctt_options_values where usuario_idusuario='".$id_usuario."'";
		$sqlcaja=mysql_query($stringcaja) or die ("Error: ".mysql_error());
		$cantidadcaja=mysql_num_rows($sqlcaja);
		?>
		<script>
					/*
		// Creamos un objeto
		var object = { 'nick_u' : '<?php //echo $nick_usuario ?>
			',
			'clave_u' : '
<?php //echo $clave_usuario ?>
			',
			'id_u' : '
<?php //echo $id_usuario ?>
			'};
			var password = {'clave_usu' : '
<?php //echo $clav ?>
			'};
			var nick = {'nick_usu' : '
<?php //echo $nick_usuario ?>
			'};
			var email = {'email_usu' : '
<?php //echo $email_usuario ?>
			'};
			var idioma = {'idioma_usu' : '
<?php //echo $idioma_usuario ?>
			'};
			var pais = {'pais_usu' : '
<?php //echo $pais_usuario ?>
			'};
			// Lo guardamos en localStorage pasandolo a cadena con JSON
			localStorage.setItem('key', JSON.stringify(object));
			localStorage.setItem('clave', JSON.stringify(password));
			localStorage.setItem('nickkey', JSON.stringify(nick));
			localStorage.setItem('emailkey', JSON.stringify(email));
			localStorage.setItem('idiomakey', JSON.stringify(idioma));
			localStorage.setItem('paiskey', JSON.stringify(pais));
			*/

			localStorage.nick_u='
<?php echo $nick_usuario?>
	';
	localStorage.clave_u='
<?php echo $clave_usuario?>
			';
			localStorage.id_u='
<?php echo $id_usuario?>
			';
			localStorage.clave_usu='
<?php echo $clav?>
			';
			localStorage.nick_usu='
<?php echo $nick_usuario?>
			';
			localStorage.email_usu='
<?php echo $email_usuario?>
			';
			localStorage.idioma_usu='
<?php echo $idioma_usuario?>
			';
			localStorage.pais_usu='
<?php echo $pais_usuario?>
			';

		<?php
for($aaa=1; $aaa<=$cantidadcaja; $aaa++)
{
$campocaja=mysql_fetch_array($sqlcaja);
		?>
					/*
		var opciones = { 'data<?php //echo $campocaja['idOpcion'] ?>' : '<?php //echo $campocaja['value'] ?>
			'};
			localStorage.setItem('ls
<?php //echo $campocaja['idOpcion'] ?>
			', JSON.stringify(opciones));
			*/
			localStorage.data
<?php echo $campocaja['idOpcion']?>
			=
			'
<?php echo $campocaja['value']?>
			';
		<?php
if($idnombre == $campocaja['idOpcion'])
{
		?>
					/*
		var setnombre = { 'nombre_u' : '<?php //echo $campocaja['value'] ?>
			'};
			localStorage.setItem('nombrekey', JSON.stringify(setnombre));
			*/
			localStorage.nombre_u='
<?php echo $campocaja['value']?>
			';
		<?php
		}
		if($idapellido == $campocaja['idOpcion'])
		{
		?>
					/*
		var setapellido = { 'apellido_u' : '<?php //echo $campocaja['value'] ?>
			'};
			localStorage.setItem('apellidokey', JSON.stringify(setapellido));
			*/
			localStorage.apellido_u='
<?php echo $campocaja['value']?>
			';
		<?php
		}
		//echo $idapellido." - ".$campocaja['idOpcion']." / ".$idnombre." - ".$campocaja['idOpcion'];
		}
		?></script>
		<?php
		pasar("../PagPersonal.php");
		}
		else
		{
		?>
		<script>
			$(document).ready(function() {
				$.alert.open({
					title : 'ERROR',
					icon : 'error',
					content : 'La contrase�a ingresada es incorrecta',
					callback : function() {
						history.go(-1);
					}
				});
			});
		</script>
		<?php
		}
		}
		}
		else
		{
		?>
		<script>
			$(document).ready(function() {
				$.alert.open({
					title : 'ERROR',
					icon : 'error',
					content : 'Usuario inv�lido.',
					callback : function() {
						history.go(-1);
					}
				});
			});
		</script>
		<?php
		}
		}
		?>
	</body>
</html>