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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>


    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo RUTA_URL;?>/Admin/inicio">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL;?>/Admin/animes"> Agregar animes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTA_URL;?>/Admin/contenido">Ver contenido</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTA_URL;?>/Admin/episodiosPeliculas">Agregar contenido</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTA_URL;?>/Admin/usuarios">Ver usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTA_URL;?>/Admin/CrearUsuario">Agregar usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo RUTA_URL;?>/Login/logout" tabindex="-1" aria-disabled="true">Cerrar sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
 
