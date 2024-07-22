<?php


class Anime {

    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function obtenerAnimes(){

        $this->db->query("select * from animes");

        $resultados = $this->db->registros();  
        return  $resultados;

    }

    public function agregarAnime($datos){
        $this->db->query('INSERT INTO `animes` ( `AnimeId`, `Tipo`, `NombreAnime`, `NombreKanjiAnime`, 
        `IntroduccionAnime`, `IntroHeroAnime`, `TipoAnime`, `GeneroAnime`, `EstudioAnime`, 
        `AnnoAnime`, `EstadoAnime`, `DuracionAnime`, `ImagenAnime`, `ImagenAnimeHero`, 
        `ImagenAnimePopular`) VALUES (:AnimeId, :Tipo, :NombreAnime, :NombreKanjiAnime, :IntroduccionAnime, 
        :IntroHeroAnime,:TipoAnime, :GeneroAnime, :EstudioAnime,:AnnoAnime, :EstadoAnime, 
        :DuracionAnime, :ImagenAnime, :ImagenAnimeHero, :ImagenAnimePopular)');


            //Vinculos los valores
        $this->db->bind(':AnimeId', trim($_POST['AnimeId']));
        $this->db->bind(':Tipo', trim($_POST['Tipo']));
        $this->db->bind(':NombreAnime', trim($_POST['NombreAnime']));
        $this->db->bind(':NombreKanjiAnime', trim($_POST['NombreKanjiAnime']));
        $this->db->bind(':IntroduccionAnime', trim($_POST['IntroduccionAnime']));
        $this->db->bind(':IntroHeroAnime', trim($_POST['IntroHeroAnime']));
        $this->db->bind(':TipoAnime', trim($_POST['TipoAnime']));
        $this->db->bind(':GeneroAnime', trim($_POST['GeneroAnime']));
        $this->db->bind(':EstudioAnime', trim($_POST['EstudioAnime']));
        $this->db->bind(':AnnoAnime', trim($_POST['AnnoAnime']));
        $this->db->bind(':EstadoAnime', trim($_POST['EstadoAnime']));
        $this->db->bind(':DuracionAnime', trim($_POST['DuracionAnime']));
        $marcaDeTiempo = date('Y-m-d_His');
        $this->db->bind(':ImagenAnime', $marcaDeTiempo . '_' . $_FILES['ImagenAnime']['name']);
        $this->db->bind(':ImagenAnimeHero', $marcaDeTiempo . '_' . $_FILES['ImagenAnimeHero']['name']);
        $this->db->bind(':ImagenAnimePopular', $marcaDeTiempo . '_' . $_FILES['ImagenAnimePopular']['name']);



        //Ejecuto la consulta

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function buscarAnime($IdAnime) {
        $this->db->query('SELECT * FROM `animes` WHERE `IdAnime` = :id');
        $this->db->bind(':id', $IdAnime);
    
        $resultado = $this->db->registro();
    
        if ($resultado) {
            return $resultado; 
        } else {
            return null; 
        }
    }
    
    // En Anime.php (o tu modelo correspondiente)

public function editarAnime($datos) {
    $this->db->query('UPDATE `animes` SET 
        `AnimeId` = :AnimeId,
        `Tipo` = :Tipo,
        `NombreAnime` = :NombreAnime,
        `NombreKanjiAnime` = :NombreKanjiAnime,
        `IntroduccionAnime` = :IntroduccionAnime,
        `IntroHeroAnime` = :IntroHeroAnime,
        `TipoAnime` = :TipoAnime,
        `GeneroAnime` = :GeneroAnime,
        `EstudioAnime` = :EstudioAnime,
        `AnnoAnime` = :AnnoAnime,
        `EstadoAnime` = :EstadoAnime,
        `DuracionAnime` = :DuracionAnime 
    WHERE `IdAnime` = :IdAnime');

    // Vincular los valores
    $this->db->bind(':IdAnime', $datos['IdAnime']);
    $this->db->bind(':AnimeId', $datos['AnimeId']);
    $this->db->bind(':Tipo', $datos['Tipo']);
    $this->db->bind(':NombreAnime', $datos['NombreAnime']);
    $this->db->bind(':NombreKanjiAnime', $datos['NombreKanjiAnime']);
    $this->db->bind(':IntroduccionAnime', $datos['IntroduccionAnime']);
    $this->db->bind(':IntroHeroAnime', $datos['IntroHeroAnime']);
    $this->db->bind(':TipoAnime', $datos['TipoAnime']);
    $this->db->bind(':GeneroAnime', $datos['GeneroAnime']);
    $this->db->bind(':EstudioAnime', $datos['EstudioAnime']);
    $this->db->bind(':AnnoAnime', $datos['AnnoAnime']);
    $this->db->bind(':EstadoAnime', $datos['EstadoAnime']);
    $this->db->bind(':DuracionAnime', $datos['DuracionAnime']);

    // Ejecutar la consulta
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}


public function eliminarAnime($animeId) {
    $this->db->query('DELETE FROM animes WHERE IdAnime = :anime_id');
    $this->db->bind(':anime_id', $animeId);

    // Ejecutar la consulta
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}
    



}





?>