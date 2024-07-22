<?php require_once(RUTA_APP . '\vistas\inc\header.php'); ?>

<h1><?php   ////echo $datos['titulo']; ?></h1>

<h1><?php  /// echo RUTA_APP; ?></h1>

<ul>
    <?php /*foreach($datos['articulos'] as $articulo): ?>
        <li>
            <?php echo $articulo->titulo; ?>
        </li>

    <?php endforeach;*/ ?>


</ul>

<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
        <?php
$count = 0; // Inicializar el contador

foreach ($datos['animes'] as $anime) :
    // Incrementar el contador
    $count++;
    ?>
    <div class="hero__items set-bg" data-setbg="<?php echo RUTA_URL; ?>/public/img/hero/<?php echo $anime->ImagenAnimeHero; ?>">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero__text">
                    <div class="label"><?php echo $anime->TipoAnime; ?></div>
                    <h2><?php echo $anime->NombreAnime; ?></h2>
                    <p><?php echo $anime->IntroHeroAnime; ?></p>
                    <?php
                    // Definir $link con un valor predeterminado
                    $link = '#';

                    // Comprobar el tipo de contenido (anime o película) y asignar el enlace correspondiente
                    if ($anime->Tipo === 'Anime') {
                        $link = RUTA_URL . '/Paginas/verAnime?anime_id=' . $anime->IdAnime;
                    } else if ($anime->Tipo === 'Pelicula') {
                        $link = RUTA_URL . '/Paginas/verPelicula?anime_id=' . $anime->IdAnime;
                    }
                    ?>
                    <a href="<?php echo $link; ?>"><span>Ver Ahora</span> <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php
    // Verificar si se alcanzó el límite de 4 elementos
    if ($count >= 10) {
        break;
    }
endforeach;
?>


        </div>
    </div>
</section>

      
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Recien Agregados</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">Ver mas <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php
                    $count = 0; // Inicializar el contador

                    foreach ($datos['animes'] as $anime) :
                        // Incrementar el contador
                        $count++;
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?php echo RUTA_URL; ?>/public/img/popular/<?php echo $anime->ImagenAnimePopular; ?>">
                                    <div class="ep"><?php echo $anime->Tipo; ?></div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li><?php echo $anime->EstadoAnime; ?></li>
                                        <li><?php echo $anime->TipoAnime; ?></li>
                                    </ul>
                                    <h5><a href="<?php echo RUTA_URL; ?>/Paginas/infoAnime?anime_id=<?php echo $anime->IdAnime; ?>"><?php echo $anime->NombreAnime; ?></a></h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        // Verificar si se alcanzó el límite de 4 elementos
                        if ($count >= 6) {
                            break;
                        }
                    endforeach;
                    ?>

                    </div>
                </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Animes</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php
                            $count = 0; // Inicializar el contador

                            foreach ($datos['animes'] as $anime) :
                                // Verificar si el tipo de anime es 'Anime'
                                if ($anime->Tipo == 'Anime') :
                                    // Incrementar el contador
                                    $count++;
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="<?php echo RUTA_URL; ?>/public/img/popular/<?php echo $anime->ImagenAnimePopular; ?>">
                                                <div class="ep"><?php echo $anime->Tipo; ?></div>
                                            </div>
                                            <div class="product__item__text">
                                                <ul>
                                                    <li><?php echo $anime->EstadoAnime; ?></li>
                                                    <li><?php echo $anime->TipoAnime; ?></li>
                                                </ul>
                                                <h5><a href="<?php echo RUTA_URL; ?>/Paginas/infoAnime?anime_id=<?php echo $anime->IdAnime; ?>"><?php echo $anime->NombreAnime; ?></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endif;

                                // Verificar si se alcanzó el límite de 4 elementos
                                if ($count >= 4) {
                                    break;
                                }
                            endforeach;
                        ?>

                      
                        </div>
                    </div>
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Peliculas</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php
                            $count = 0; // Inicializar el contador

                            foreach ($datos['animes'] as $anime) :
                                // Verificar si el tipo de anime es 'Anime'
                                if ($anime->Tipo == 'Pelicula') :
                                    // Incrementar el contador
                                    $count++;
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="<?php echo RUTA_URL; ?>/public/img/popular/<?php echo $anime->ImagenAnimePopular; ?>">
                                                <div class="ep"><?php echo $anime->Tipo; ?></div>
                                            </div>
                                            <div class="product__item__text">
                                                <ul>
                                                    <li><?php echo $anime->EstadoAnime; ?></li>
                                                    <li><?php echo $anime->TipoAnime; ?></li>
                                                </ul>
                                                <h5><a href="<?php echo RUTA_URL; ?>/Paginas/infoAnime?anime_id=<?php echo $anime->IdAnime; ?>"><?php echo $anime->NombreAnime; ?></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endif;

                                // Verificar si se alcanzó el límite de 4 elementos
                                if ($count >= 4) {
                                    break;
                                }
                            endforeach;
                        ?>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Top Views</h5>
                            </div>
                            <ul class="filter__controls">
                               
                            </ul>
                            <div class="filter__gallery">
                                <div class="product__sidebar__view__item set-bg mix day years"
                                data-setbg="img/sidebar/tv-1.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Boruto: Naruto next generations</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix month week"
                            data-setbg="img/sidebar/tv-2.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg mix week years"
                        data-setbg="img/sidebar/tv-3.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg mix years month"
                    data-setbg="img/sidebar/tv-4.jpg">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix day"
                data-setbg="img/sidebar/tv-5.jpg">
                <div class="ep">18 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">Fate stay night unlimited blade works</a></h5>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>



<?php /* ATENCION CON LOS \ SOLO FUNCIONAN CON EL REQUIRE PARA TENER
LA RUTA MEN MUCHO CUIDADO NO TE QUIERO VER LLORAR MI AMOR
*/require_once(RUTA_APP . '\vistas\inc\footer.php'); ?>

