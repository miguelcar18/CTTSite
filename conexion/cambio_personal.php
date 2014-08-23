		<link href="css/alert.min_mensaje.css" rel="stylesheet"/>
		<link href="css/theme.min_mensaje.css" rel="stylesheet"/>
		<script src="js/jquery_mensaje.js"></script>
		<script src="js/jquery-ui_mensaje.js"></script>
		<script src="js/alert.min_mensaje.js"></script>
    <?php
        include("funciones_mysql.php");
        conectar();
        
        $nick_personal= $_POST['txtnick'];
        $email_personal=$_POST['txtmail'];
        $idioma_personal=$_POST['idioma'];
        $pais_personal=$_POST['pais'];
        
        ?>
        <script>
            var revnick = JSON.parse(localStorage.getItem('nickkey'));
            var nickbdd = revnick.nick_usu;
            var nickp = "<?php echo $passactual; ?>";
            var emailp = "<?php echo $passnew01; ?>";
            var idiomap = "<?php echo $passnew02; ?>";
            var paisp = "<?php echo $passnew02; ?>";
            
            var expRegEmail2=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
            
            if(nickp == nickbdd)
            {
                $(document).ready(function(){
		$.alert.open({
		title: 'ERROR',
		icon: 'error',
		content: 'Este nick de usuario ya se encuentra registrado'
		});
		});
            }
            
            else if (!expRegEmail2.exec(emailp)) 
            {
                $(document).ready(function(){
		$.alert.open({
		title: 'ERROR',
		icon: 'error',
		content: 'Formato de email no valido'
		});
		});
            }
            
            else if(nickp == nickbdd)
            {
                <?php 
                    $stringChange="update usuario set "
                            . "nick_usuario='".$nick_personal."', "
                            . "email_usuario='".$email_personal."', "
                            . "idioma_usuario='".$idioma_personal."', "
                            . "pais_usuario='".$pais_personal."' "
                            . "where idusuario='".$_POST['hiddenid3']."'";
                    $mysqlChange=mysql_query($stringChange) or die ("Error: ".mysql_error());
                ?>
                localStorage.removeItem('nickkey');
                localStorage.removeItem('emailkey');
                localStorage.removeItem('idiomakey');
                localStorage.removeItem('paiskey');
                var nickch = {'nick_usu' : '<?php echo $nick_personal?>'};
                var emailch = {'email_usu' : '<?php echo $email_personal?>'};
                var idiomach = {'idioma_usu' : '<?php echo $idioma_personal?>'};
                var paisch = {'pais_usu' : '<?php echo $pais_personal?>'};
                localStorage.setItem('nickkey', JSON.stringify(nickch));
                localStorage.setItem('emailkey', JSON.stringify(emailch));
                localStorage.setItem('idiomakey', JSON.stringify(idiomach));
                localStorage.setItem('paiskey', JSON.stringify(paisch));
                var nickkey2 = JSON.parse(localStorage.getItem('nickkey'));
                var emailkey2 = JSON.parse(localStorage.getItem('emailkey'));
                var idiomakey2 = JSON.parse(localStorage.getItem('idiomakey'));
                var paiskey2 = JSON.parse(localStorage.getItem('paiskey'));
                $(document).ready(function(){
                    $('#txtnick').val(nickkey2.nick_usu);
                    $('#txtmail').val(emailkey2.email_usu);
                    $('#lg'+idiomakey2.idioma_usu+'').attr('selected', 'selected');
                    $('#ct'+paiskey2.pais_usu+'').attr('selected', 'selected');
                    $.alert.open({
                    title: 'MENSAJE',
                    icon: 'info',
                    content: 'Datos modificados correctamente.'
		});
            });
            }
        </script>
        <?php
		
        
    ?>
