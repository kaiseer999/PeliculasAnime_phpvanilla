<?php require_once(RUTA_APP . '\vistas\inc\Adminheader.php'); 

if (isset($_GET['exito']) && $_GET['exito'] == 'true') {
  echo '<script>alert("¡Operación exitosa!");</script>';
}
?>






  <table class="table-responsive-xxl">
    <thead>
      <tr>
        <th>Id Anime</th>
        <th>Nombre anime</th>
        <th>Nombre kanji</th>
        <th>Introduccion anime</th>
        <th>Intro Hero anime</th>
        <th>Tipo anime</th>
        <th>Generos anime</th>
        <th>Estudio anime</th>
        <th>Año anime</th>
        <th>Estado anime</th>
        <th>Duracion anime</th>
        <th>Imagen anime</th>
        <th>Imagen Tipo Hero</th>
        <th>Imagen Tipo Popular</th>
        <th>Editar</th>
        <th>Eliminar</th>

      </tr>
    
    </thead>

    <tbody>
    <?php foreach($datos['animes'] as $anime) : ?>  
      <tr  class="align-top">
        <td><?php echo $anime->AnimeId?></td>
        <td><?php echo $anime->NombreAnime?></td>
        <td><?php echo $anime->NombreKanjiAnime?></td>
        <td><?php echo $anime->IntroduccionAnime?></td>
        <td><?php echo $anime->IntroHeroAnime?></td>
        <td><?php echo $anime->TipoAnime?></td>
        <td><?php echo $anime->GeneroAnime?></td>
        <td><?php echo $anime->EstudioAnime?></td>
        <td><?php echo $anime->AnnoAnime?></td>
        <td><?php echo $anime->EstadoAnime?></td>
        <td><?php echo $anime->DuracionAnime?></td>
        <td><img  width="100"  src="../public/img/anime/<?php echo $anime->ImagenAnime ?>" height="100"> </td>
        <td><img src="../public/img/hero/<?php echo $anime->ImagenAnimeHero?>" height="100" width="100"></td>
        <td><img src="../public/img/popular/<?php echo $anime->ImagenAnimePopular?>"  height="100" width="100"> </td>
        <td>
    <button class="btn btn-primary" onclick="location.href='<?php echo RUTA_URL?>/Admin/editarAnimes?anime_id=<?php echo $anime->IdAnime?>'">
        Editar
    </button>
</td>
<td>
    <button class="btn btn-danger" onclick="location.href='<?php echo RUTA_URL?>/Admin/eliminarAnimes?anime_id=<?php echo $anime->IdAnime?>'">
        Eliminar
    </button>
</td>

      </tr>
    <?php endforeach; ?>
    </tbody>



  </table>

<?php require_once(RUTA_APP . '\vistas\inc\Adminfooter.php'); ?>

