<?php


Class Video{


    private $db;

    public function __construct()
    {
        $this->db = new Database;

    }

    public function obtenerVideos(){

        $this->db->query("select * from videos");

        $resultados = $this->db->registros();  
        return  $resultados;
    }

    public function agregarVideo($datos){
        $this->db->query('INSERT INTO `videos` (`IdAnime`, `NombreVideo`, `TipoVideo`,`NumeroVideo`)
         VALUES (:IdAnime, :NombreVideo, :TipoVideo, :NumeroVideo)');

         $this->db->bind('IdAnime', trim($_POST['IdAnime']));
         $marcaDeTiempo = date('Y-m-d_His');
         $this->db->bind('NombreVideo', $marcaDeTiempo.'_'.$_FILES['NombreVideo']['name']);
         $this->db->bind('TipoVideo', trim($_POST['TipoVideo']));
         $this->db->bind('NumeroVideo', trim($_POST['NumeroVideo']));

         if($this->db->execute()){
            return true;
        }else{
            return false;
        }

        

    }

     public function buscarEpisodios($IdAnime) {
        $this->db->query('SELECT * FROM `videos` WHERE `IdAnime` = :id');
        $this->db->bind(':id', $IdAnime);
    
        $resultado = $this->db->registros();
    
        if ($resultado) {
            return $resultado; 
        } else {
            return null; 
        }
        
    }

    public function buscarEpisodio($IdAnime) {
        $this->db->query('SELECT * FROM `videos` WHERE `IdAnime` = :id');
        $this->db->bind(':id', $IdAnime);
    
        $resultado = $this->db->registro();
    
        if ($resultado) {
            return $resultado; 
        } else {
            return null; 
        }
        
    }

    








}



















?>