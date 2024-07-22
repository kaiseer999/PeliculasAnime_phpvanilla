<?php

        class Paginas extends Controlador{

            private $animeModelo;
            private $videoModelo;


            public function __construct()
            {
                //echo 'Controlador cargado';
                $this->animeModelo= $this->modelo('Anime');
                $this->videoModelo= $this->modelo('Video');


            }
 
            public function index(){
                //para pasar parametros 
                $animes = $this->animeModelo->obtenerAnimes();


                $datos = [
                    
                    'animes'=>$animes

                ];
                
                $this->vista('paginas/inicio', $datos);

            
            }

            public function prueba() {
                $this->vista('paginas/articulo');
            }

            public function anime(){
                $this->vista('paginas/animes');
            }   
            
            public function verAnime() {
                if (isset($_GET['anime_id'])) {
                    $animeId = $_GET['anime_id'];
            

                    $detallesDelAnime = $this->animeModelo->buscarAnime($animeId);
                    $episodios = $this->videoModelo->buscarEpisodios($animeId);
                    $nombre = $detallesDelAnime->NombreAnime;
                    $tipo = $detallesDelAnime->TipoAnime;
                    $nombreVideo = $episodios[0]->NombreVideo;
                    $AnimePeli= $detallesDelAnime->Tipo;
                    

                    
            
                    $datos = [
                        'animeId' => $animeId,
                        'nombre' => $nombre,
                        'tipo' => $tipo,
                        'episodio'=>$episodios,
                        'nombreVideo'=>$nombreVideo,
                        'AnimePeli'=>$AnimePeli
                    ];
                    $this->vista('paginas/VerAnime', $datos);
                }
            }



            public function verPelicula() {
                if (isset($_GET['anime_id'])) {
                    $animeId = $_GET['anime_id'];
            

                    $detallesDelAnime = $this->animeModelo->buscarAnime($animeId);
                    $episodios = $this->videoModelo->buscarEpisodios($animeId);
                    $nombre = $detallesDelAnime->NombreAnime;
                    $tipo = $detallesDelAnime->TipoAnime;
                    $nombreVideo = $episodios[0]->NombreVideo;
                    $AnimePeli= $detallesDelAnime->Tipo;
                    

                    
            
                    $datos = [
                        'animeId' => $animeId,
                        'nombre' => $nombre,
                        'tipo' => $tipo,
                        'episodio'=>$episodios,
                        'nombreVideo'=>$nombreVideo,
                        'AnimePeli'=>$AnimePeli
                    ];
                    $this->vista('paginas/VerPelicula', $datos);
                }
            }

            public function infoAnime(){

                if (isset($_GET['anime_id'])) {
                $animeId = $_GET['anime_id'];


                $animes = $this->animeModelo->obtenerAnimes();
                /////////////
                $detallesDelAnime = $this->animeModelo->buscarAnime($animeId);
                $NombreAnime= $detallesDelAnime->NombreAnime;

                $datos=[

                    'animes'=>$detallesDelAnime


                ];

                $this->vista('paginas/InfoAnime', $datos);

            }

            }
            
           




        }
        




?>