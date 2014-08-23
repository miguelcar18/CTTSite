		<link href="css/alert.min_mensaje.css" rel="stylesheet"/>
		<link href="css/theme.min_mensaje.css" rel="stylesheet"/>
		<script src="js/jquery_mensaje.js"></script>
		<script src="js/jquery-ui_mensaje.js"></script>
		<script src="js/alert.min_mensaje.js"></script>
    <?php
        include("funciones_mysql.php");
        conectar();
        
        $passactual= crypt($_POST['passactual'],"2A");
        $passnew01=crypt($_POST['passnew01'],"2A");
        $passnew02=crypt($_POST['passnew02'],"2A");
        
        ?>
        <script>
            var passls = JSON.parse(localStorage.getItem('clave'));
            var passwordactual = passls.clave_usu;
            var passwordingresado = "<?php echo $passactual; ?>";
            var passwordnuevo01 = "<?php echo $passnew01; ?>";
            var passwordnuevo02 = "<?php echo $passnew02; ?>";
            
            if(passwordnuevo01 != passwordnuevo02)
            {
                $(document).ready(function(){
		$.alert.open({
		title: 'ERROR',
		icon: 'error',
		content: 'Las contraseñas nuevas deben de ser iguales',
		});
		});
            }
            
            else if(passwordingresado != passwordactual)
            {
                $(document).ready(function(){
		$.alert.open({
		title: 'ERROR',
		icon: 'error',
		content: 'La contraseña ingresada no es igual a la registrada',
		});
		});
            }
            
            else if(passwordingresado == passwordactual)
            {
                <?php 
                    $stringChange="update usuario set "
                            . "clave_usuario='".$passnew01."' "
                            . "where idusuario='".$_POST['hiddenid2']."'";
                    $mysqlChange=mysql_query($stringChange) or die ("Error: ".mysql_error());
                ?>
                localStorage.removeItem('clave');
                var passwordch = {'clave_usu' : '<?php echo $clav?>'};
                localStorage.setItem('clave', JSON.stringify(passwordch));
                $(document).ready(function(){
                    $.alert.open({
                    title: 'MENSAJE',
                    icon: 'info',
                    content: 'Contraseña modificada correctamente.'
		});
            });
            }
        </script>
        <?php
		
        
    ?>
