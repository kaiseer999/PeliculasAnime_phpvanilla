<?php

class Admin extends Controlador{

    private $animeModelo;
    private $videoModelo;
    private $usuarioModelo;



    public function __construct()
    {
        $this->animeModelo= $this->modelo('Anime');
        $this->videoModelo= $this->modelo('Video');
        $this->usuarioModelo= $this->modelo('Usuario');


    }

    public function inicio() {
        
        //Obtener animes
        $animes = $this->animeModelo->obtenerAnimes();

        $datos=[

            'animes'=>$animes

        ];

        $this->vista('paginas/InicioAdmin', $datos);
    }

    public function usuarios(){

        $user= $this->usuarioModelo->obtenerUsuarios();

        $datos=[
            'usuario'=>$user
        ];

        $this->vista('paginas/VerUsuario', $datos);


    }

    public function animes() {
        $this->vista('paginas/AdminAnimes');
    }

    public function agregarAnime(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            // Guarda la imagen en diferentes carpetas
            $destinoReferencia = '../public/img/anime/';
            $destinoHero = '../public/img/hero/';
            $destinoPopular = '../public/img/popular/';
            $fecha = new DateTime();
            $marcaDeTiempo = $fecha->getTimestamp();
            
            $errores = [];
    
            // Mueve la imagen de referencia
            if (isset($_FILES['ImagenAnime'])) {
                $nombreImagenTemp = date('Y-m-d_His', $marcaDeTiempo) . '_' . $_FILES['ImagenAnime']['name'];
                $Imagen_temp = $_FILES['ImagenAnime']['tmp_name'];
                $destinoImagen = $destinoReferencia . $nombreImagenTemp;
    
                if (move_uploaded_file($Imagen_temp, $destinoImagen)) {
                    echo 'Imagen de referencia se ha movido exitosamente.';
                } else {
                    $errores[] = 'Error al mover la imagen de referencia.';
                }
            }
    
           // Mueve la imagen tipo Hero
            if (isset($_FILES['ImagenAnimeHero'])) {
                $nombreImagenHeroTemp = date('Y-m-d_His', $marcaDeTiempo) . '_' . $_FILES['ImagenAnimeHero']['name'];
                $ImagenHero_temp = $_FILES['ImagenAnimeHero']['tmp_name'];
                $destinoHeroImagen = $destinoHero . $nombreImagenHeroTemp;

                if (move_uploaded_file($ImagenHero_temp, $destinoHeroImagen)) {
                    echo 'Imagen tipo Hero se ha movido exitosamente.';
                } else {
                    $errores[] = 'Error al mover la imagen tipo Hero.';
                }
            }

            // Mueve la imagen tipo Popular
            if (isset($_FILES['ImagenAnimePopular'])) {
                $nombreImagenPopularTemp = date('Y-m-d_His', $marcaDeTiempo) . '_' . $_FILES['ImagenAnimePopular']['name'];
                $ImagenPopular_temp = $_FILES['ImagenAnimePopular']['tmp_name'];
                $destinoPopularImagen = $destinoPopular . $nombreImagenPopularTemp;

                if (move_uploaded_file($ImagenPopular_temp, $destinoPopularImagen)) {
                    echo 'Imagen tipo Popular se ha movido exitosamente.';
                } else {
                    $errores[] = 'Error al mover la imagen tipo Popular.';
                }
            }

    
            if (empty($errores)) {
                // Todas las imágenes se movieron correctamente
                
        
                $datos = [
                    'IdAnime' => trim($_POST['AnimeId']),
                    'Tipo' => trim($_POST['Tipo']),
                    'NombreAnime' => trim($_POST['NombreAnime']),
                    'NombreKanjiAnime' => trim($_POST['NombreKanjiAnime']),
                    'IntroduccionAnime' => trim($_POST['IntroduccionAnime']),
                    'IntroHeroAnime' => trim($_POST['IntroHeroAnime']),
                    'TipoAnime' => trim($_POST['TipoAnime']),
                    'GeneroAnime' => trim($_POST['GeneroAnime']),
                    'EstudioAnime' => trim($_POST['EstudioAnime']),
                    'AnnoAnime' => date('Y/m/d', strtotime($_POST['AnnoAnime'])),
                    'EstadoAnime' => trim($_POST['EstadoAnime']),
                    'DuracionAnime' => trim($_POST['DuracionAnime']),
                    'ImagenAnime' => date('Y-m-d_His', $marcaDeTiempo) . '_' . $_FILES['ImagenAnime']['name'],
                    'ImagenAnimeHero' => date('Y-m-d_His', $marcaDeTiempo) . '_' . $_FILES['ImagenAnimeHero']['name'],
                    'ImagenAnimePopular' => date('Y-m-d_His', $marcaDeTiempo) . '_' . $_FILES['ImagenAnimePopular']['name']
                ];
    
                if ($this->animeModelo->agregarAnime($datos)) {
                    redireccionar('/Admin/animes?exito=true');
                } else {
                    $errores[] = 'Error al agregar el anime en la base de datos.';
                }
            }
    
            // Manejo de errores 
            if (!empty($errores)) {
                foreach ($errores as $error) {
                    echo $error . '<br>';
                }
            }
        } else {
            $datos = [
                'IdAnime' => ' ',
                'Tipo' => ' ',
                'NombreAnime' => ' ',
                'NombreKanjiAnime' => ' ',
                'IntroduccionAnime' => ' ',
                'IntroHeroAnime' => ' ',
                'TipoAnime' => ' ',
                'GeneroAnime' => ' ',
                'EstudioAnime' => ' ',
                'AnnoAnime' => ' ',
                'EstadoAnime' => ' ',
                'DuracionAnime' => ' ',
                'ImagenAnime' => ' ',
                'ImagenAnimeHero' => ' ',
                'ImagenAnimePopular' => ' '
            ];
    
            $this->vista('Admin/AdminAnime', $datos);
        }

    }



    
    public function editarAnime() {
        // Verificar si se ha proporcionado un ID de anime en la URL
        if (isset($_GET['anime_id'])) {
            $animeId = $_GET['anime_id'];
    
            // Obtener los datos del anime para mostrar en el formulario de edición
            $anime = $this->animeModelo->buscarAnime($animeId);
    
            // Verificar si se ha enviado un formulario por POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Validar y procesar los datos del formulario
                $datos = [
                    'IdAnime' => $animeId, // Asegúrate de que $animeId esté definido antes
                    'AnimeId' => trim($_POST['AnimeId']),
                    'Tipo' => trim($_POST['Tipo']),
                    'NombreAnime' => trim($_POST['NombreAnime']),
                    'NombreKanjiAnime' => trim($_POST['NombreKanjiAnime']),
                    'IntroduccionAnime' => trim($_POST['IntroduccionAnime']),
                    'IntroHeroAnime' => trim($_POST['IntroHeroAnime']),
                    'TipoAnime' => trim($_POST['TipoAnime']),
                    'GeneroAnime' => trim($_POST['GeneroAnime']),
                    'EstudioAnime' => trim($_POST['EstudioAnime']),
                    'AnnoAnime' => date('Y/m/d', strtotime($_POST['AnnoAnime'])),
                    'EstadoAnime' => trim($_POST['EstadoAnime']),
                    'DuracionAnime' => trim($_POST['DuracionAnime']),
                ];
                

                
    
                // Actualizar el anime en la base de datos
                if ($this->animeModelo->editarAnime($datos)) {
                    redireccionar('/Admin/inicio?exito=true');

                } else {
                    echo 'Error al editar el anime en la base de datos.';
                }
            } else {
                // Mostrar formulario de edición con los datos actuales del anime
                $datos = [
                    'anime' => $anime,
                ];
    
                $this->vista('Admin/EditarAnime', $datos);
            }
        } else {
            echo 'ID de anime no proporcionado.';
        }
    }
    
    public function CrearUsuario(){
        $this->vista('paginas/AgregarUsuario');
    }
    
    
    public function editarAnimes(){
        $animeId = isset($_GET['anime_id']) ? $_GET['anime_id'] : null;
        $anime = $animeId ? $this->animeModelo->buscarAnime($animeId) : null;
    
        $datos = [
            'id' => $animeId,
            'anime' => $anime,
        ];
    
        $this->vista('paginas/EditarAdmin', $datos);
    }

    public function eliminarAnime() {
        // Verificar si se ha proporcionado un ID de anime en la URL
        if (isset($_GET['anime_id'])) {
            $animeId = $_GET['anime_id'];
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->animeModelo->eliminarAnime($animeId)) {
                    redireccionar('/Admin/inicio?exito=true');
                } else {
                    echo 'Error al eliminar el anime de la base de datos.';
                }
            } else {
                // Mostrar un formulario de confirmación antes de la eliminación
                $datos = [
                    'anime_id' => $animeId,
                ];
    
                $this->vista('Admin/ConfirmarEliminar', $datos);
            }
        } else {
            echo 'ID de anime no proporcionado.';
        }
    }
    
    public function eliminarAnimes(){
        $animeId = isset($_GET['anime_id']) ? $_GET['anime_id'] : null;
        $anime = $animeId ? $this->animeModelo->buscarAnime($animeId) : null;
    
        $datos = [
            'id' => $animeId,
            'anime' => $anime,
        ];
    
        $this->vista('paginas/EliminarAdmin', $datos);

    }
    

    public function contenido(){

        $videos = $this->videoModelo->obtenerVideos();

        $datos=[

            'videos'=>$videos

        ];

        $this->vista('paginas/ContenidoPagina', $datos);
    }


    public function episodiosPeliculas(){

        $animes = $this->animeModelo->obtenerAnimes();


        $datos=[

            'animes'=>$animes

        ];
        $this->vista('paginas/AdminContenido', $datos);


    }

    public function agregarContenido(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fecha = new DateTime();
            $marcaDeTiempo = $fecha->getTimestamp();
            $destinoEp = '../public/videos/Episodios/';
            $destinoPe = '../public/videos/Peliculas/';

            $errores = [];
    
            // Mueve la imagen de referencia
            if (isset($_FILES['NombreVideo']) ) {

                $nombreVideoTemp = date('Y-m-d_His', $marcaDeTiempo) . '_' . $_FILES['NombreVideo']['name'];
                $videoTemp=$_FILES['NombreVideo']['tmp_name'];

                if(isset($_POST['TipoVideo']) && $_POST['TipoVideo']=='Episodio'){
                $destinoVideo= $destinoEp . $nombreVideoTemp;
                    if(move_uploaded_file($videoTemp, $destinoVideo)){
                        echo 'Video movido con exito';
                    }else{
                        $errores[] = 'Error al mover el video';
                    }

                }else{
                    $destinoVideo=$destinoPe . $nombreVideoTemp;
                    if(move_uploaded_file($videoTemp, $destinoVideo)){
                        echo 'Video movido con exito';
                    }else{
                        $errores[] = 'Error al mover el video';
                    }

                }
            }




            $datos=[

                
                'IdAnime'=>trim($_POST['IdAnime']),
                'NombreVideo'=>date('Y-m-d_His', $marcaDeTiempo) . '_' . $_FILES['NombreVideo']['name'],
                'TipoVideo'=>trim($_POST['TipoVideo']),
                'NumeroVideo'=>trim($_POST['NumeroVideo'])
            ];

            if ($this->videoModelo->agregarVideo($datos)) {
                redireccionar('/Admin/episodiosPeliculas?exito=true');
            } 

        }else{
            
            $datos=[

                'IdAnime'=>' ',
                'NombreVideo'=>' ',
                'TipoVideo'=>' ',
                'NumeroVideo'=>' '

            ];

            $this->vista('Admin/AdminContenido', $datos);

        }


    }

    //public 


}






?>

