<?php require_once(RUTA_APP . '\vistas\inc\header.php'); 



?>


<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href=""><?php echo $datos['AnimePeli']?></a>
                        <a href=""><?php echo $datos['tipo']?></a>
                        <span><?php echo $datos['nombre']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
   
    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
    <div class="anime__video__player">
        <video id="player" playsinline controls data-poster="./videos/anime-watch.jpg">
            <?php
            // Obtiene el número del episodio actual de la URL
            $episodioActual = isset($_GET['episodio']) ? (int)$_GET['episodio'] : 1;

            // Aseguro de que el número de episodio esté dentro de los límites
            $episodioActual = max(1, min($episodioActual, count($datos['episodio'])));

            // Obtiene la URL del video del episodio actual
            $videoURL = RUTA_URL . '/public/videos/Episodios/' . $datos['episodio'][$episodioActual - 1]->NombreVideo;
            ?>
            <source src="<?php echo $videoURL; ?>" type="video/mp4" />
        </video>
    </div>

    <div class="anime__details__episodes">
        <div class="section-title">
            <h5>Episodios</h5>
        </div>
        <?php
        foreach ($datos['episodio'] as $episodio) {
            $numeroEpisodio = $episodio->NumeroVideo;
            $claseActivo = $numeroEpisodio == $episodioActual ? 'active' : '';
            $episodeLink = RUTA_URL . '/Paginas/verAnime?anime_id=' . $datos['animeId'] . '&episodio=' . $numeroEpisodio;
            
            echo '<a href="' . $episodeLink . '" class="episode-link ' . $claseActivo . '">' . $numeroEpisodio . '</a>';
        }
        ?>
        <div class="episode-navigation">
            <?php
        // Calcula el número del episodio anterior y siguiente
        $episodioAnterior = $episodioActual - 1;
        $episodioSiguiente = $episodioActual + 1;

        // Asegúrate de que no haya episodios negativos
        $episodioAnterior = max(1, $episodioAnterior);

        // Ajusta el número del episodio siguiente según tu lógica
        $episodioSiguiente = min($episodioSiguiente, count($datos['episodio']));

        // Construye los enlaces "Capítulo Anterior" y "Siguiente Capítulo" usando los números de episodio
        echo '<a href="' . RUTA_URL . '/Paginas/verAnime?anime_id=' . $datos['animeId'] . '&episodio=' . $episodioAnterior . '" class="btn btn-primary">Capítulo Anterior</a>';
        echo '<a href="' . RUTA_URL . '/Paginas/verAnime?anime_id=' . $datos['animeId'] . '&episodio=' . $episodioSiguiente . '" class="btn btn-primary">Siguiente Capítulo</a>';
        ?>
        </div>
    </div>
</div>
</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Comentarios</h5>

                            <div id="disqus_thread"></div>
                        <script>
                            /**
                            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://animecomentarios.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        </div>
                    </div>

            </div>
        </div>
    </section>
    <?php require_once(RUTA_APP . '\vistas\inc\footer.php'); ?>
