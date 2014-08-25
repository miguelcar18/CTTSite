		<link href="../css/alert.min_mensaje.css" rel="stylesheet"/>
		<link href="../css/theme.min_mensaje.css" rel="stylesheet"/>
		<script src="../js/jquery_mensaje.js"></script>
		<script src="../js/jquery-ui_mensaje.js"></script>
		<script src="../js/alert.min_mensaje.js"></script>
        <script>
           localStorage.clear();
            $(document).ready(function(){
                $.alert.open({
                title: 'MENSAJE',
                icon: 'info',
                content: 'Ha cerrado la sesion correctamente.',
                callback: function() {
                    location.href = "../index.html";
                    }
            });
            });
        </script>
        <?php
		
        
    ?>
