<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Ejemplos de práctica</title>
    </head>
    
    <body>
        <?php
        include("operaciones/funciones.php");
        
        $ew = obtenerNavegadorWeb();
        $navegador = $ew['nombre']; //Nombre del Navegador en Uso
        $ipcliente=obtenerIP();
        
        $link= $_SERVER['HTTP_HOST']
        .":".$_SERVER['SERVER_PORT']
        .$_SERVER['REQUEST_URI'];
        
        /*echo 'Sistema Operativo: '.php_uname('s').'<br>'
                . 'Navegador Web: '.$navegador.'<br>'
                . 'Dirección MAC: <script type="text/javascript">'
                . 'checkTimeZone();</script> '.$_SERVER['SERVER_ADDR'].'<br>'
                . 'IP NUEVA: '.$ipcliente.'<br>'
                . crypt('1234',"2A").'<br>';*/
        echo "URL: ".$_SERVER['HTTP_HOST'];
        ?>
    </body>
</html>