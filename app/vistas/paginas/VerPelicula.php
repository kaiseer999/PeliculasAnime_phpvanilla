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
    if (!empty($datos['episodio'])) {
        $videoURL = RUTA_URL . '/public/videos/Peliculas/' . $datos['episodio'][0]->NombreVideo;
    } else {
        // Manejar el caso donde no hay episodios
        $videoURL = ''; // O cualquier lógica que prefieras
    }
    ?>
    <source src="<?php echo $videoURL; ?>" type="video/mp4" />
</video>



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