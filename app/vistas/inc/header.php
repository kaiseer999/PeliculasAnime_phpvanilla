<?php

session_start();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['user'])) {
   //echo 'Sesión iniciada exitosamente';
    // Agrega aquí cualquier contenido personalizado para usuarios con sesión iniciada
} else {
    //echo 'Sesión no iniciada';

    // Establecer el tiempo de vida de la sesión en segundos (ejemplo: 1 hora)
    $sessionLifetime = 3600;  // 1 hora (3600 segundos)

    // Verifica si la sesión ha expirado
    if (isset($_SESSION['expire_time']) && time() > $_SESSION['expire_time']) {
        // La sesión ha expirado, puedes cerrar la sesión o redirigir al usuario a la página de inicio de sesión
        session_unset();
        session_destroy();
        header("Location: /Login/Ingresar");
        exit;
    }

    // Actualiza el tiempo de expiración en cada interacción del usuario
    $_SESSION['expire_time'] = time() + $sessionLifetime;
    // Agrega aquí cualquier contenido para usuarios sin sesión iniciada
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo NOMBRESITIO; ?></title>


   <!-- Google Font -->
   <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    
    <!-- estilossss-->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/style.css" type="text/css">


  




</head>
<body>

    <!-- Page Preloder -->
    

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo" style="text-align: center; padding-top: 10px;">
                        <a href="<?php echo RUTA_URL;?>/">
                        <img src="<?php echo RUTA_URL; ?>/public/img/logoEvee.png" width="110" height="38">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="<?php echo RUTA_URL;?>/Paginas/inicio">Inicio</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        <a href="<?php echo RUTA_URL;?>/Login/Ingresar"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    
