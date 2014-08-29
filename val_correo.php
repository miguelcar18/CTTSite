<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="css/alert.min_mensaje.css" rel="stylesheet"/>
<link href="css/theme.min_mensaje.css" rel="stylesheet"/>
<script src="js/jquery_mensaje.js"></script>
<script src="js/jquery-ui_mensaje.js"></script>
<script src="js/alert.min_mensaje.js"></script>
</head>

<body>
<?php
include("conexion/funciones_mysql.php");
$conn=conectar();

$link= $_SERVER['HTTP_HOST']
        .":".$_SERVER['SERVER_PORT']
        .$_SERVER['REQUEST_URI'];

$sistema=$_SERVER['REQUEST_URI'];
$variable1=str_replace('/xcttsite/val_correo.php?','',$sistema);
$variable=str_replace('/xcttsite/val_correo.php?','',$variable1);

$string="select * from usuario where hash='".$variable."'";
$sql=mysql_query($string) or die ('Error: '.mysql_error());
$numero=  mysql_num_rows($sql);

switch($numero) 
{
    case "1":
    {
        $campo=mysql_fetch_array($sql);
        $enabled=$campo['enabled'];
        if($enabled==0)
        {
            $string02="update usuario set "
                    . "enabled='1' "
                    . "where hash='".$variable."'";
            $sql02=mysql_query($string02) or die ('Error: '.mysql_error());
            ?>
            <script>
				$(document).ready(function(){
					$.alert.open({
					title: 'MENSAJE',
					icon: 'info',
					content: 'Validacion de registro exitosa. Ya puede iniciar sesion.',
					callback: function() {
                    location.href = "index.html";
                    }
					});
    			});
            </script>
            <?php
            //pasar("../index.html");
        }
        else
        {
            ?>
            <script>
				$(document).ready(function(){
					$.alert.open({
					title: 'ADVERTENCIA',
					icon: 'warning',
					content: 'Este usuario ya ha sido registrado.',
					callback: function() {
                    location.href = "index.html";
                    }
					});
    			});
            </script>
            <?php
            //pasar("../index.html");
        }
    }
    break;
    case "0":
    {
        ?>
            <script>
				$(document).ready(function(){
					$.alert.open({
					title: 'ERROR',
					icon: 'error',
					content: 'Link no valido.',
					callback: function() {
                    location.href = "index.html";
                    }
					});
    			});
            </script>
            <?php
            //pasar("../index.html");
    }
    break;
}
?>
</body>

</html>