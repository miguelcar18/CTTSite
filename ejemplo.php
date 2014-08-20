<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Ejemplos de práctica</title>
        <script src="js/mysqlwslib.js"></script>
    </head>
    
    <body>
        <?php
        include("operaciones/funciones.php");
        
        //$ew = obtenerNavegadorWeb();
        //$navegador = $ew['nombre']; //Nombre del Navegador en Uso
        //$ipcliente=obtenerIP();
        
        /*echo 'Sistema Operativo: '.php_uname('s').'<br>'
                . 'Navegador Web: '.$navegador.'<br>'
                . 'Dirección MAC: <script type="text/javascript">'
                . 'checkTimeZone();</script> '.$_SERVER['SERVER_ADDR'].'<br>'
                . 'IP NUEVA: '.$ipcliente.'<br>'
                . crypt('1234',"2A");*/
        echo "Mensaje";
        ?>
        <script>
        var arrayResult = mysql_select_query ("SELECT * FROM usuario");
        var i=0;
        for (i=0; i< arrayRelengthsult.length; i++) {
            var fila = arrayResult[i];
            var columna = arrayResult[i][0];
            alert("fila "+fila+". columna "+columna+".");
        }
        </script>
    </body>
</html>