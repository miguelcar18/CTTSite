		<link href="css/alert.min_mensaje.css" rel="stylesheet"/>
		<link href="css/theme.min_mensaje.css" rel="stylesheet"/>
		<script src="js/jquery_mensaje.js"></script>
		<script src="js/jquery-ui_mensaje.js"></script>
		<script src="js/alert.min_mensaje.js"></script>
    <?php
        include("funciones_mysql.php");
        conectar();
		
        $stringbna="select * from ctt_opciones "
        . "where desc_opcion='Nombre' "
        . "or desc_opcion='Apellido'";
        $sqlbna=mysql_query($stringbna) or die("Error: ".mysql_error());
        
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
        
        foreach($_POST as $nombre_campo => $valor){ 
        $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
        eval($asignacion);
        
        if($valor != 'on' and $nombre_campo != 'hiddenid')
        {
            $verGrupoOpcion=str_replace('texto_','',$nombre_campo);
			
			$stringVerificar="select usuario_idusuario, idOpcion from ctt_options_values "
			."where usuario_idusuario='".$_POST['hiddenid']."' and idOpcion='".$verGrupoOpcion."'";
			$sqlVerificar=mysql_query($stringVerificar) or die ("Error en linea 19: ".mysql_error());
			$cantidadVerificar=mysql_num_rows($sqlVerificar);
			
			if($cantidadVerificar==0 && $_POST['chck'.$verGrupoOpcion]=='on')
			{
				//$separar=explode('_',$verGrupoOpcion);
				//$grupo=$separar[0];
				//$opcion=$separar[1];
				$stringingreso="insert into ctt_options_values "
					. "(idOpcion, value, usuario_idusuario) "
					. "values "
					. "('".$verGrupoOpcion."',"
					. "'".$valor."',"
					. "'".$_POST['hiddenid']."')";
				$sqlingreso=mysql_query($stringingreso) or die ("Error al ingresar los datos".mysql_error());
				?>
				<script>
					var opcionesls = { 'data<?php echo $verGrupoOpcion?>' : '<?php echo $valor?>'};
					localStorage.setItem('ls<?php echo $verGrupoOpcion?>', JSON.stringify(opcionesls));
					var obtenerls = JSON.parse(localStorage.getItem('<?php echo $verGrupoOpcion?>'));
				</script>
                <?php
			}
			else if ($cantidadVerificar > 0 && $_POST['chck'.$verGrupoOpcion]=='on')
			{
				$stringupdate="update ctt_options_values set "
					. "value='".$valor."' "
					. "where usuario_idusuario='".$_POST['hiddenid']."' and idOpcion='".$verGrupoOpcion."'";
				$sqlupdate=mysql_query($stringupdate) or die ("Error al actualizar los datos: ".mysql_error());
				?>
				<script>
					localStorage.removeItem('ls<?php echo $verGrupoOpcion?>');
					var opcionesls = { 'data<?php echo $verGrupoOpcion?>' : '<?php echo $valor?>'};
					localStorage.setItem('ls<?php echo $verGrupoOpcion?>', JSON.stringify(opcionesls));
					var obtenerls = JSON.parse(localStorage.getItem('<?php echo $verGrupoOpcion?>'));
				</script>
                <?php
			}
                        if($idnombre == $verGrupoOpcion)
                        {
                            ?>
                            <script>
                            localStorage.removeItem('nombrekey');
                            var setnombre = { 'nombre_u' : '<?php echo $valor?>'};
                            localStorage.setItem('nombrekey', JSON.stringify(setnombre));
                            </script>
                            <?php
                        }
                        if($idapellido == $verGrupoOpcion)
                        {
                            ?>
                            <script>
                            localStorage.removeItem('apellidokey');
                            var setapellido = { 'apellido_u' : '<?php echo $valor?>'};
                            localStorage.setItem('apellidokey', JSON.stringify(setapellido));
                            </script>
                            <?php
                        }
			?>
            <script>
            var nombrekey0 = JSON.parse(localStorage.getItem('nombrekey'));
            var apellidokey0 = JSON.parse(localStorage.getItem('apellidokey'));
            var nombrecompleto0=""+nombrekey0.nombre_u+" "+apellidokey0.apellido_u;

            $(document).ready(function(){
				$("#chck"+<?php echo $verGrupoOpcion?>+"").prop("checked", false);
				$("#texto_"+<?php echo $verGrupoOpcion?>+"").attr("disabled", true);
				//donde dice holaaaaa debe ir obtenerls.<?php //echo $verGrupoOpcion?>
				$("#texto_"+<?php echo $verGrupoOpcion?>+"").val(""+obtenerls.<?php echo $verGrupoOpcion?>+"");
                                $("#titulo").html(""+nombrecompleto0+"");
            });
        </script>
            <?php
        }
        
        }
        
        /**/
        ?>
       <script>
            $(document).ready(function(){
			$.alert.open({
			title: 'MENSAJE',
			icon: 'info',
			content: 'Datos ingresados correctamente.',
		});
            });
        </script>
        <?php
        //pasar("../PagPersonal.php");
    ?>
