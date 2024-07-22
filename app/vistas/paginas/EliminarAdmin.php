<?php require_once(RUTA_APP . '\vistas\inc\Adminheader.php');


?>






<div class="card">
    
<div class="card-header"> 

Eliminar anime
</div>
<div class="card-body">
<form action="<?php echo RUTA_URL; ?>/Admin/eliminarAnime?anime_id=<?php echo $datos['id']; ?>" method="post">
<div class="scrollable-form overflow-auto" >
        <div class="form-group">
            <label for="IdAnime">Id del anime:</label>
            <input readonly type="text" class="form-control" required name="AnimeId" value="<?php echo $datos['anime']->AnimeId; ?>" id="IdAnime">
        </div>
        <div class="form-group">
        <label for="Tipo">Tipo:</label>
          <select readonly class="form-control"  required name="Tipo" id="Tipo">
              <option value="Anime">Anime</option>
              <option value="Pelicula">Película</option>
          </select>
        </div>
        <div class="form-group">
            <label for="NombreAnime">Nombre del anime:</label>
            <input readonly type="text" class="form-control"  required value="<?php echo $datos['anime']->NombreAnime; ?>"  name="NombreAnime" id="NombreAnime">
        </div>
        <div class="form-group">
            <label for="NombreKanjiAnime">Nombre del anime en kanji:</label>
            <input readonly type="text" class="form-control" name="NombreKanjiAnime" required value="<?php echo $datos['anime']->NombreKanjiAnime; ?>" id="NombreKanjiAnime">
        </div>
        <div class="form-group">
            <label for="IntroAnime">Introduccion del anime:</label>
            <textarea readonly class="form-control" name="IntroduccionAnime"   id="IntroAnime"   rows="4"><?php echo $datos['anime']->IntroduccionAnime; ?></textarea>
        </div>
        <div class="form-group">
            <label for="IntroAnime">Intro Hero del anime:</label>
            <textarea readonly class="form-control" name="IntroHeroAnime"   id="IntroHeroAnime" rows="4"><?php echo $datos['anime']->IntroHeroAnime; ?></textarea>
        </div>
        <div class="form-group">
          <label for="TipoAnime">Tipografía del anime:</label>
          <select readonly class="form-control" name="TipoAnime" required id="TipoAnime">
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
            <input readonly type="text" class="form-control" required value="<?php echo $datos['anime']->GeneroAnime; ?>" name="GeneroAnime" id="GeneroAnime">
        </div>
        <div class="form-group">
            <label for="EstudioAnime">Estudio del anime:</label>
            <input readonly type="text" class="form-control" name="EstudioAnime"required  value="<?php echo $datos['anime']->EstudioAnime; ?>" id="EstudioAnime">
        </div>
        <div class="form-group">
            <label for="AnnoAnime">Año de lanzamiento:</label>
            <input readonly type="date" class="form-control" name="AnnoAnime" required value="<?php echo $datos['anime']->AnnoAnime; ?>" id="AnnoAnime">
        </div>
        <div class="form-group">
          <label for="EstadoAnime">Estado del anime:</label>
          <select readonly class="form-control" name="EstadoAnime" required id="EstadoAnime">
              <option value="Culminado">Culminado</option>
              <option value="Emisión">Emisión</option>
          </select>
        </div>

        <div class="form-group">
            <label for="DuracionAnime">Duracion:</label>
            <input readonly type="text" class="form-control" required value="<?php echo $datos['anime']->DuracionAnime; ?>"name="DuracionAnime" id="DuracionAnime">
        </div>
        
    </div>
    <br>
    <input type="submit" class="btn btn-danger" value="Eliminar Anime">
</form>
</div>

</div>









<?php require_once(RUTA_APP . '\vistas\inc\Adminfooter.php'); ?>