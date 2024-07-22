<?php require_once(RUTA_APP . '\vistas\inc\Adminheader.php');

if (isset($_GET['exito']) && $_GET['exito'] === 'true') {
    echo '<script>alert("¡Operación exitosa!");</script>';
}



?>





<div class="card">
    
<div class="card-header"> 

Datos del anime
</div>
<div class="card-body">
<form action="<?php echo RUTA_URL;?>/Admin/agregarAnime" method="post" enctype="multipart/form-data">
<div class="scrollable-form overflow-auto" >
        <div class="form-group">
            <label for="IdAnime">Id del anime:</label>
            <input type="text" class="form-control" name="AnimeId" id="IdAnime">
        </div>
        <div class="form-group">
        <label for="Tipo">Tipo:</label>
          <select class="form-control" name="Tipo" id="Tipo">
              <option value="Anime">Anime</option>
              <option value="Pelicula">Película</option>
          </select>
        </div>
        <div class="form-group">
            <label for="NombreAnime">Nombre del anime:</label>
            <input type="text" class="form-control" name="NombreAnime" id="NombreAnime">
        </div>
        <div class="form-group">
            <label for="NombreKanjiAnime">Nombre del anime en kanji:</label>
            <input type="text" class="form-control" name="NombreKanjiAnime" id="NombreKanjiAnime">
        </div>
        <div class="form-group">
            <label for="IntroAnime">Introduccion del anime:</label>
            <textarea class="form-control" name="IntroduccionAnime" id="IntroAnime" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="IntroAnime">Intro Hero del anime:</label>
            <textarea class="form-control" name="IntroHeroAnime" id="IntroHeroAnime" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="TipoAnime">Tipografía del anime:</label>
          <select class="form-control" name="TipoAnime" id="TipoAnime">
              <option value="Shonen">Shonen</option>
              <option value="Shojo">Shojo</option>
              <option value="Seinen">Seinen</option>
              <option value="Josei">Josei</option>
              <option value="Kodomo">Kodomo</option>
              <option value="Harem">Harem</option>
              <option value="Mecha">Mecha</option>
              <option value="Isekai">Isekai</option>
              <!-- Agrega más opciones según sea necesario -->
          </select>
        </div>
        <div class="form-group">
            <label for="GeneroAnime">Generos del anime:</label>
            <input type="text" class="form-control" name="GeneroAnime" id="GeneroAnime">
        </div>
        <div class="form-group">
            <label for="EstudioAnime">Estudio del anime:</label>
            <input type="text" class="form-control" name="EstudioAnime" id="EstudioAnime">
        </div>
        <div class="form-group">
            <label for="AnnoAnime">Año de lanzamiento:</label>
            <input type="date" class="form-control" name="AnnoAnime" id="AnnoAnime">
        </div>
        <div class="form-group">
          <label for="EstadoAnime">Estado del anime:</label>
          <select class="form-control" name="EstadoAnime" id="EstadoAnime">
              <option value="Culminado">Culminado</option>
              <option value="Emisión">Emisión</option>
          </select>
        </div>

        <div class="form-group">
            <label for="DuracionAnime">Duracion:</label>
            <input type="text" class="form-control" name="DuracionAnime" id="DuracionAnime">
        </div>
        <div class="form-group">
            <label for="ImagenAnime">Imagen de referencia:</label>
            <input type="file" class="form-control" name="ImagenAnime" id="ImagenAnime">
        </div>
        <div class="form-group">
            <label for="ImagenAnime">Imagen anime tipo Hero:</label>
            <input type="file" class="form-control" name="ImagenAnimeHero" id="ImagenAnimeHero">
        </div>
        <div class="form-group">
            <label for="ImagenAnime">Imagen anime tipo Popular:</label>
            <input type="file" class="form-control" name="ImagenAnimePopular" id="ImagenAnimePopular">
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-success" value="Guardar Anime">
</form>
</div>

</div>









<?php require_once(RUTA_APP . '\vistas\inc\Adminfooter.php'); ?>
