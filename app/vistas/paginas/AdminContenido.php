<?php require_once(RUTA_APP . '\vistas\inc\Adminheader.php');

if (isset($_GET['exito']) && $_GET['exito'] === 'true') {
    echo '<script>alert("¡Operación exitosa!");</script>';
}
?>





<div class="card">
    
<div class="card-header"> 

Datos del video
</div>
<div class="card-body">
<form action="<?php echo RUTA_URL;?>/Admin/agregarContenido" method="post" enctype="multipart/form-data">
<div class="" >
      

        <div class="form-group">
        <label for="SelectAnime">Selecciona un anime:</label>
        <select class="form-control" name="IdAnime" id="SelectAnime">
        <?php foreach ($datos['animes'] as $anime) : ?>
            <option value="<?php echo $anime->IdAnime; ?>"><?php echo $anime->NombreAnime; ?></option>
        <?php endforeach; ?>
        </select>
        </div>
        <div class="form-group">
            <label for="ArchivoVideo">Archivo de video: </label>
            <input type="file" class="form-control" name="NombreVideo" id="ArchivoVideo">
        </div>
        <div class="form-group">
            <label for="TipoVid">Tipo de video: </label>
            <select name="TipoVideo" id="TipoVid" class="form-control">
            <option value="Episodio">Episodio</option>
            <option value="Pelicula">Pelicula</option>
            </select>
        </div>

        <div class="form-group">
            <label for="NumEp">Episodio:</label>
            <input type="text" class="form-control" name="NumeroVideo" id="NumEp">
        </div>





        <br>
        <input type="submit" class="btn btn-success" value="Guardar Anime">
</form>
</div>
</div>














<?php require_once(RUTA_APP . '\vistas\inc\Adminfooter.php'); ?>
