<?php require_once(RUTA_APP . '\vistas\inc\header.php'); ?>



<section class="normal-breadcrumb set-bg" data-setbg="<?php echo RUTA_URL; ?>/public/img/eveLogin_Register.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Ingresa</h2>
                        <p>Bienvenido a <?php echo NOMBRESITIO;?>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">   
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Ingresa tus datos</h3>
                        <form action="<?php echo RUTA_URL;?>/Login/LogIn" method="post">
                            <div class="input__item">
                                <input type="text" name="NombreUsuario" placeholder="Nombre de usuario" required>
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" name="Contraseña" placeholder="Contraseña" required>
                                <span class="icon_lock"></span>
                            </div>
                            <center>
                            <button type="submit" class="site-btn">Ingresar</button>
                            </center>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <center>
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <a href="<?php echo RUTA_URL;?>/Login/Registro" class="primary-btn">Regístrate ahora</a>
                    </center>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With
                                Facebook</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








<?php require_once(RUTA_APP . '\vistas\inc\footer.php'); ?>