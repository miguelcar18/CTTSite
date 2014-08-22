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
            include("funciones_mysql.php");
            include("../operaciones/funciones.php");
            $conn=conectar();
            
            $ew = obtenerNavegadorWeb();
            $navegador = $ew['nombre'];
            
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
                        $nombre_usuario=$rs['nombre_usuario'];
                        $habilitado=$rs['enabled'];
                        if($clav==$clave_usuario && $habilitado==0)
                        {
                            ?>
                            <script>
					$(document).ready(function(){
		$.alert.open({
		title: 'ADVERTENCIA',
		icon: 'warning',
		content: 'Por favor, revise su correo electronico y valide su registro.',
		callback: function() {
				history.go(-1);
			}
		});
		});
            </script>
                            <?php
                        }
                        
                        else if($clav==$clave_usuario && $habilitado==1)
                        {
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
                                // Creamos un objeto
                                var object = { 'nick_u' : '<?php echo $nick_usuario?>', 
                                    'clave_u' : '<?php echo $clave_usuario?>', 
                                    'nombre_u' : '<?php echo $nombre_usuario?>',
                                    'id_u' : '<?php echo $id_usuario?>'};
                                // Lo guardamos en localStorage pasandolo a cadena con JSON
                                localStorage.setItem('key', JSON.stringify(object));
								<?php
								for($aaa=1; $aaa<=$cantidadcaja; $aaa++)
								{
									$campocaja=mysql_fetch_array($sqlcaja);
								?>
								var opciones = { 'data<?php echo $campocaja['idOpcion']?>' : '<?php echo $campocaja['value']?>'};
								localStorage.setItem('ls<?php echo $campocaja['idOpcion']?>', JSON.stringify(opciones));
								<?php
								}
								?>
                            </script>
                            <?php
                            pasar("../PagPersonal.php");
                        }
                        else
                        {
                            ?>
                            <script>
								$(document).ready(function(){
		$.alert.open({
		title: 'ERROR',
		icon: 'error',
		content: 'La contraseña ingresada es incorrecta',
		callback: function() {
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
								$(document).ready(function(){
		$.alert.open({
		title: 'ERROR',
		icon: 'error',
		content: 'Usuario inválido.',
		callback: function() {
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