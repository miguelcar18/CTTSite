<?php
    include("conexion/funciones_mysql.php");
    conectar();

    $stringGrupo="select * from ctt_grupos_opciones order by id_grupo asc";
    $sqlGrupo=mysql_query($stringGrupo) or die ("Error linea 7: ".mysql_error());
    $cantidadGrupo=mysql_num_rows($sqlGrupo);

    $stringOpcJav="select idctt_opciones, desc_opcion from ctt_opciones order by id_grupo asc";
    $sqlOpcJav=mysql_query($stringOpcJav) or die("Error linea 10: ".mysql_error());
    $cantOpcJav=mysql_num_rows($sqlOpcJav);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>CTT | Home :: Pag.Personal</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Monda:400,700' rel='stylesheet' type='text/css'>
        
        <link href="css/alert.min_mensaje.css" rel="stylesheet"/>
        <link href="css/theme.min_mensaje.css" rel="stylesheet"/>
        
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        
        <script src="js/jquery_mensaje.js"></script>
        <script src="js/jquery-ui_mensaje.js"></script>
        <script src="js/alert.min_mensaje.js"></script>
        
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <script src="js/jquery.min.js"></script>
        <script src="js/easyResponsiveTabs.js"></script>
        <!----start-accordinatio-files--->
        <script src="js/vallenato.js" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" href="css/vallenato.css" type="text/css" media="screen" charset="utf-8">
        <!----start-accordinatio-files--->	
        
        <script>
            //alert(localStorage.length);
            var object2 = JSON.parse(localStorage.getItem('key'));
            // Mostrar variabes localstorage
            /*alert(object2.nick_u);
            alert(object2.clave_u);
            alert(object2.nombre_u);
            alert(object2.id_u);*/
			$(document).ready(function() {
				$('#hiddenid').val(object2.id_u);
            });
        </script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true, // 100% fit in a container
                    closed: 'accordion', // Start closed if in accordion view
                    activate: function(event) { // Callback function if tab is switched
                        var $tab = $(this);
                        var $info = $('#tabInfo');
                        var $name = $('span', $info);

                        $name.text($tab.text());

                        $info.show();
                    }
                });

		$('#verticalTab').easyResponsiveTabs({
		    type: 'vertical',
		    width: 'auto',
		    fit: true
		});
	    });
	</script>
	<!----Calender -------->
	<link rel="stylesheet" href="css/clndr.css" type="text/css" />
	<script src="js/underscore-min.js"></script>
	<script src= "js/moment-2.2.1.js"></script>
	<script src="js/clndr.js"></script>
	<script src="js/site.js"></script>
	<!----End Calender -------->
        <script type="text/javascript">
            /*$(document).ready(function() {
                var object2 = JSON.parse(localStorage.getItem('key'));
                $("#titulo").empty();
                $("#titulo").html(object2.nombre_u);
            });*/  
        </script>
        <script language ="Javascript">

		<?php  
		for ($aaa=1; $aaa<=$cantOpcJav; $aaa++)
		{
			$campoOpcJav=mysql_fetch_array($sqlOpcJav);
			$idGrupo=$campoOpcJav['idctt_opciones'];
			$descOpcion=$campoOpcJav['desc_opcion'];
			$nmarca=$idGrupo;
		?>
		
		function marca_<?php echo $nmarca ?>(){
		if(document.getElementById("chck<?php echo $nmarca ?>").checked){
		document.getElementById("texto_<?php echo $nmarca ?>").disabled=false;
		//document.getElementById("texto_<?php echo $nmarca ?>").style.backgroundColor='#FFFFFF'
		document.getElementById("texto_<?php echo $nmarca ?>").focus();
		}
		else{
		document.getElementById("texto_<?php echo $nmarca ?>").disabled=true;
		//document.getElementById("texto_<?php //echo $nmarca ?>").value="<?php //echo $descOpcion ?>";
		//document.getElementById("texto_<?php //echo $nmarca ?>").style.backgroundColor='#D6D3CE'
		}
		}
		<?php
		}
		?>
        </script>
        <script language ="Javascript">
            function leer()
            {
				var object2 = JSON.parse(localStorage.getItem('key'));
            $(function()
            {
                $("#btn-enviar").click(function(){
                    var uurl="conexion/grupo_datos.php";
					$('#hiddenid').val(object2.id_u);
                    $.ajax(
                        {
                            type:"POST",
                            url:uurl,
                            data:$("#form_grupos").serialize(),
                            success:function(data){
                                $("#resultado").html(data);
                            }
                        }
                    );
                    return false;
                });
            });
            }
        </script>
    </head>
    <body>
	<!--Menu-->
	<div class="span1_of_list"><!-- start span1_of_list -->
            <ul class="social_list">
                <li><a href="#"><i class="icon_1"></i></a></li>
                <li><a href="#"><i class="icon_2"></i></a></li>
                <li><a href="#"><i class="icon_3"></i></a></li>
                <div class="clear"></div>
            </ul>
            <div class="search">
                <form>
                    <input type="text" value="">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="clear"></div>
	</div>
	<div class="wrap">
            <div class="wrap-col">		
                <div class="wrap">
                    <div class="span_of_3"><!-- start span_of_3 -->
                        <div class="span1_of_3"><!-- start span1_of_3 -->
                            <div id="verticalTab"><!-- start vertical Tabs-->
                                <ul class="resp-tabs-list">
                                    <li><i class="icon_1"></i></li>
                                    <li><i class="icon_4"></i></li>
                                    <li><i class="icon_3"></i></li>
                                </ul>
                                <div class="resp-tabs-container">
                                    <div class="new_posts">
                                        <div class="main grid">
                                            <div class="col-1-2">
                                                <div class="wrap-col">
                                                    <h3 id="titulo">Titulo</h3>
                                                </div>
                                            </div>
                                            <div class="col-1-2">
                                                <div class="wrap-col">
                                                    <!-- este punto puede cambiar el RESPONSIVE. -->  			
                                                    <div class="marco"> 
                                                        <img src="images/silueta.gif" width="100" height="115" alt=""> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fin  punto -->  
                                        <div class="vertical_post">
                                            <form>
                                                <span>Nombre ususario o nick</span>
                                                <input type="text" class="text" value="Nick" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                    this.value = 'Nick';
                                                }">
                                                <span>eMail</span>
                                                <input type="text" class="text" value="contrase�a" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                this.value = 'contrase�a';
                                                }">
                                                <span>Idioma preferido</span>			
                                                <select name=idioma class="combo" >
                                                    <option name=one value=uno> uno </option>
                                                    <option name=two value=dos> dos </option>
                                                    <option name=three value=tres selected> tres </option>
                                                    <option name=four value=cuatro> cuatro </option>
                                                </select>
                                                <span>Pais</span>
                                                <select name=idioma class="combo" >
                                                    <option name=one value=uno selected> uno </option>
                                                    <option name=two value=dos> dos </option>
                                                    <option name=three value=tres > tres </option>
                                                    <option name=four value=cuatro> cuatro </option>
                                                </select>
                                                <div class="main grid">
                                                    <div class="col-1-2">
                                                        <div class="wrap-col">
                                                                <input type="reset" value="Atras"/>  					    
                                                        </div>
                                                    </div>
                                                    <div class="col-1-2">
                                                        <div class="wrap-col">
                                                            <input type="submit" value="Acepta"/>
                                                        </div>
                                                    </div>	
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="new_posts">
                                        <div class="vertical_post">
                                            <h3>Seguridad</h3>
                                            <form>
                                                <span>Contrase&ntilde;a actual</span>
                                                <input type="text" class="text" value="Nick" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                this.value = 'Nick';}">
                                                <span>Nueva contrase&ntilde;a</span>
                                                <input type="text" class="text" value="contrase�a" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                this.value = 'contrase�a';}">
                                                <span>Repita contrase&ntilde;a</span>
                                                <input type="text" class="text" value="contrase�a" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                this.value = 'contrase�a';}">
						<div class="rel_para"></div>
						<div class="main grid">
                                                    <div class="col-1-2">
                                                        <div class="wrap-col">
                                                                <input type="reset" value="Atras"/>  					    
                                                        </div>
                                                    </div>
                                                    <div class="col-1-2">
                                                        <div class="wrap-col">
                                                                <input type="submit" value="Acepta"/>	 
                                                        </div>
                                                    </div>	
						</div>	
                                            </form>							
                                        </div>
                                    </div>
                                    <div class="new_posts">
                                        <form name="form_grupos" id="form_grupos" method="post" action="conexion/grupo_datos.php">
					<input name="hiddenid" id="hiddenid" type="hidden" value="">
					<?php
                                            for ($i=1; $i<= $cantidadGrupo; $i++)
                                            {
                                                $campoGrupo=mysql_fetch_array($sqlGrupo);
						$nombreGrupo=$campoGrupo['desc_grupo'];
                                        ?>
						<h2 class="accordion-header">Datos <?php echo $nombreGrupo?></h2>
						<div class="accordion-content" style="width: 244px; display: none;">
                                                    <?php
                                                        $stringOpciones="select * from ctt_opciones "
                                                        . "where ctt_opciones.id_grupo=".$i."";
                                                        $sqlOpciones=mysql_query($stringOpciones) or die("Error linea 201: ".mysql_error());
                                                        $cantidadOpciones=mysql_num_rows($sqlOpciones); 
							for($j=1; $j<=$cantidadOpciones; $j++)
							{
                                                            $campoOpciones=mysql_fetch_array($sqlOpciones);
                                                            $desc_opcion=$campoOpciones['desc_opcion'];
															$idctt_opciones=$campoOpciones['idctt_opciones'];
                                                    ?>
                                                            <div class="rel_post_list">
                                                                <div class="rel__check" style="float:left;width:100%">
                                                                    <div style="float:left;width:10%">
                                                                        <input type="checkbox" name="chck<?php echo $idctt_opciones?>" id="chck<?php echo $idctt_opciones?>" onclick="marca_<?php echo $idctt_opciones ?>()">
                                                                    </div>
                                                                    <div style="float:left;width:30%">
                                                                        <i><?php echo $desc_opcion?> </i>
                                                                    </div>
                                                                    <div style="float:left;width:60%">
                                                                        <input type="text" class="text" name="texto_<?php echo $idctt_opciones?>" id="texto_<?php echo $idctt_opciones?>" value="" disabled>
                                                                    </div> 
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                            <?php
                                                        }
                                                            ?>
                                                            <!-- BOTONES APARTE-->
                                                    </div>
                                                    <?php
                                            }
                                                    ?>
                                            <div class="acord_btns">
                                            
                                                <input type="button" value="Guardar" name="btn-enviar" id="btn-enviar" onclick="leer()">
						<input type="reset" value="borrar">
						<div class="clear"></div>
                                            </div>
                                        </form>
                                        <div id="resultado"></div>
                                    </div><!-- Limite -->
                                </div>
                            </div>	  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>