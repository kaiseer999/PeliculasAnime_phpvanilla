
<?php require_once(RUTA_APP . '\vistas\inc\Adminheader.php'); ?>


<div class="card">
    
<div class="card-header"> 

Datos del video
</div>
<div class="card-body">
<form action="<?php echo RUTA_URL;?>/Login/crearUsuario" method="post" >
<div class="" >
      

        <div class="form-group">
            <label for="email">Correo Electronico: </label>
            <input type="text" class="form-control" id="email"  name="CorreoElectronico" placeholder="kaiser999@gmail.com">
        </div>
        
        <div class="form-group">
            <label for="nom">Nombre de usuario</label>
            <input type="text"   id="nom"  class="form-control" name="NombreUsuario" placeholder="xXKawaiiProGamer999Xx">
        </div>

        <div class="form-group">
            <label for="con">contraseña</label>
            <input type="text"   id="con"  class="form-control" name="Contraseña" placeholder="Contraseña">
        </div>





        <br>
        <input type="submit" class="btn btn-success" value="Crear usuario">
</form>
</div>
</div>

<?php require_once(RUTA_APP . '\vistas\inc\Adminfooter.php'); ?>
