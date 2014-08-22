		<link href="css/alert.min_mensaje.css" rel="stylesheet"/>
		<link href="css/theme.min_mensaje.css" rel="stylesheet"/>
		<script src="js/jquery_mensaje.js"></script>
		<script src="js/jquery-ui_mensaje.js"></script>
		<script src="js/alert.min_mensaje.js"></script>
    <?php
        include("funciones_mysql.php");
        conectar();
        
        foreach($_POST as $nombre_campo => $valor){ 
        $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
        eval($asignacion);
        if($valor != 'on')
        {
            $verGrupoOpcion=str_replace('texto_','',$nombre_campo);
            //$separar=explode('_',$verGrupoOpcion);
            //$grupo=$separar[0];
            //$opcion=$separar[1];
            $stringingreso="insert into ctt_options_values "
                . "(idOpcion, value, usuario_idusuario) "
                . "values "
                . "('".$verGrupoOpcion."',"
                . "'".$valor."',"
                . "'1')";
        $sqlingreso=mysql_query($stringingreso) or die ("Error al ingresar los datos".mysql_error());
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
