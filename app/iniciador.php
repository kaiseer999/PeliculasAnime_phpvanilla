<?php

    require_once 'config/configurar.php';
    require_once 'helpers/url_helper.php';

    //require_once'librerias/Database.php';
    //require_once'librerias/Controlador.php';
   // require_once'librerias/Core.php';

    //Autoload php

    spl_autoload_register(function($nombreClase){

    require_once 'librerias/'.$nombreClase.'.php';

    });


?>


