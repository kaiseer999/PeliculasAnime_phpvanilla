<?php require_once(RUTA_APP . '\vistas\inc\header.php'); ?>

<section class="anime-details spad">
<div class="container">
<div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="<?php echo RUTA_URL; ?>/public/img/anime/<?php echo $datos['animes']->ImagenAnime; ?>">
                    
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                            <h3><?php echo $datos['animes']->NombreAnime ; ?></h3>
                                <span><?php echo $datos['animes']->NombreKanjiAnime ; ?></span>
                            </div>
                            <p>
                            <?php echo $datos['animes']->IntroduccionAnime ; ?>
                            </p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8">
                                        <ul >
                                            <li><span>Demografia:</span><?php echo $datos['animes']->TipoAnime ; ?> </li>
                                            <li><span>Estudio:</span> <?php echo $datos['animes']->EstudioAnime ; ?></li>
                                            <li><span>Fecha de lanzamiento:</span> <?php echo $datos['animes']->AnnoAnime ; ?></li>
                                            <li><span>Estado:</span> <?php echo $datos['animes']->EstadoAnime ; ?></li>
                                            <li><span>Genero:</span> <?php echo $datos['animes']->GeneroAnime ; ?></li>
                                            <li><span>Duracion:</span> <?php echo $datos['animes']->DuracionAnime ; ?> min/ep</li>

                                        </ul>
                                    </div>
                                   
                                </div>
                            </div>

                            <?php
                            // Definir $link con un valor predeterminado
                            $link = '#';

                            // Comprobar el tipo de contenido (anime o película) y asignar el enlace correspondiente
                            if ($datos['animes']->Tipo === 'Anime') {
                                $link = RUTA_URL . '/Paginas/verAnime?anime_id=' . $datos['animes']->IdAnime;
                            } else if ($datos['animes']->Tipo === 'Pelicula') {
                                $link = RUTA_URL . '/Paginas/verPelicula?anime_id=' . $datos['animes']->IdAnime;
                            }
                            ?>

                            <div class="anime__details__btn">
                                <a href="<?php echo $link; ?>" class="watch-btn"><span>Ver Ahora</span> <i class="fa fa-angle-right"></i></a>
                            </div>

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


                </div>

               
               
               </section>








<?php require_once(RUTA_APP . '\vistas\inc\footer.php'); ?>

