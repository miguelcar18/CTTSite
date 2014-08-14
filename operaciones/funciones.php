<?php

function obtenerNavegadorWeb()
{
    $agente = $_SERVER['HTTP_USER_AGENT'];
    $navegador = 'Unknown';

    //Obtener el UserAgente
    if(preg_match('/MSIE/i',$agente) && !preg_match('/Opera/i',$agente))
    {
        $navegador = 'Internet Explorer';
        $navegador_corto = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$agente))
    {
        $navegador = 'Mozilla Firefox';
        $navegador_corto = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$agente))
    {
        $navegador = 'Google Chrome';
        $navegador_corto = "Chrome";
    }
    elseif(preg_match('/Safari/i',$agente))
    {
        $navegador = 'Apple Safari';
        $navegador_corto = "Safari";
    }
    elseif(preg_match('/Opera/i',$agente))
    {
        $navegador = 'Opera';
        $navegador_corto = "Opera";
    }
    elseif(preg_match('/Netscape/i',$agente))
    {
        $navegador = 'Netscape';
        $navegador_corto = "Netscape";
    }
    /*Resultado final del Navegador Web que Utilizamos*/ 
    return array(
    'agente' => $agente,
    'nombre'      => $navegador
    );
}

function obtenerIP()
{
    $ip='
        <script type="application/javascript">
            function getip(data){
              document.write(data.ip);
            }
        </script>
        <script src="http://jsonip.appspot.com/?callback=getip" type="application/javascript"></script>';
    return $ip;
}

?>
