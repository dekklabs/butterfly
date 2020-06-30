<?php
/**
 * Template Name: HomePage
 *
 * @package WordPress
 * @subpackage base
 * @since base 1.0
 */
?>

<?php get_header(); ?>
<div class="home-page">
    <!-- Body main wrapper start -->
    <div class="wrapper fix">
        <!--Hero Area Start-->
        <div class="portada-home">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center title-portada">Mariachi <br> yo soy Lucero</h1>
                        <p class="text-center description-portada">MARIACHI YO SOY LUCERO que tiene como voz principal a Joyce Valladares - Artista del programa en Latina Tv. "YO SOY" representando a la mexicana LUCERO experiencia internacional en diferentes géneros musicales, animadora, actriz y bailarina ofrece shows  carismáticos y lleno de emociones.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--Hero Area End-->

        <!--Gallery Area Start-->
        <div id="gallery-area" class="gallery-area overlay">
            <div class="container">
            
            <!--Section Title Start-->
                <div class="row">
                    <div class="section-title section-title-light text-center col-xs-12 mb-80">
                        <h2 class="title-galeria">Galeria</h2>
                    </div>
                </div>
            <!--Section Title End-->
            
            <!--Ganpoka Gallery Start-->
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="gallery-item">
                            <img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/frecuencia-latina-mariachis.jpg" alt="Frecuencia latina mariachis" />
                            <h3 class="title-galeria">Frecuencia latina mariachis</h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="gallery-item">
                            <img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/grupo-mariachi.jpg" alt="Grupo mariachi" />
                            <h3 class="title-galeria">Grupo mariachi</h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="gallery-item">
                            <img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/joyce-valladares-y-antonio-pavon.jpg" alt="Joyce Valladares y antonio pavon" />
                            <h3 class="title-galeria">Joyce Valladares y Antonio Pavon</h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="gallery-item">
                            <img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/mariachi-concierto.jpg" alt="Mariachi concierto" />
                            <h3 class="title-galeria">Mariachi concierto</h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="gallery-item">
                            <img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/mariachi-concierto2.jpg" alt="Mariachi concierto 2" />
                            <h3 class="title-galeria">Mariachi concierto</h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="gallery-item">
                            <img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/mariachi-fiesta.jpg" alt="Mariachi Fiesta" />
                            <h3 class="title-galeria">Mariachi Fiesta</h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="gallery-item">
                            <img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/mariachi-fiesta2.jpg" alt="Mariachi Fiesta" />
                            <h3 class="title-galeria">Mariachi Fiesta</h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="gallery-item">
                            <img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/mariachi-grupo.jpg" alt="Mariachi Grupo" />
                            <h3 class="title-galeria">Mariachi Grupo</h3>
                        </div>
                    </div>
                </div>
            <!--Ganpoka Gallery End-->
            
            </div>
        </div>
        <!--Gallery Area End-->

        <!--Servicios Area Start-->
        <div id="servicios-area" class="servicios-area">
            <div class="container">
                <h2 class="text-center title-servicios-area">Servicios</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card">
                            <a class="img-enlace" href="<?php echo get_site_url() ?>/mariachis-en-lima/">
                                <img class="img-servicio" src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/frecuencia-latina-mariachis.jpg" alt="Mariachis en Lima" />
                            </a>
                            <div class="card-body">
                                <h3 class="servicio-title">Mariachis en Lima</h3>
                                <div class="text-center">
                                    <a href="<?php echo get_site_url() ?>/mariachis-en-lima/" class="vermas">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card">
                            <a class="img-enlace" href="<?php echo get_site_url() ?>/serenata-de-mariachis-para-cumpleanos-y-matrimonios/">
                                <img class="img-servicio" src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/grupo-mariachi.jpg" alt="Serenata de mariachis para cumpleaños y matrimonios" />
                            </a>
                            <div class="card-body">
                                <h3 class="servicio-title">Serenata de mariachis para cumpleaños y matrimonios</h3>
                                <div class="text-center">
                                    <a href="<?php echo get_site_url() ?>/serenata-de-mariachis-para-cumpleanos-y-matrimonios/" class="vermas">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card">
                            <a class="img-enlace" href="<?php echo get_site_url() ?>/charros-para-eventos-corporativos-y-empresas/">
                                <img class="img-servicio" src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/joyce-valladares-y-antonio-pavon.jpg" alt="Charros para eventos corporativos y empresas" />
                            </a>
                            <div class="card-body">
                                <h3 class="servicio-title">Charros para eventos corporativos y empresas</h3>
                                <div class="text-center">
                                    <a href="<?php echo get_site_url() ?>/charros-para-eventos-corporativos-y-empresas/" class="vermas">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Servicios Area End-->

        <!--Video Area Start-->
        <div id="video-area" class="video-area overlay">
            <div class="container">
                <h2 class="text-center title-video-area">Videos</h2>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <!--Video Gallery-->
                        <div class="row video-gallery">
                            <div class="video-big float-left">
                                <a href="https://youtu.be/-fprb9_Bjng" class="video-gallery-popup"><img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/portada.jpg" alt="Lucero"></a>
                            </div>
                            <div class="video-thumb float-left">
                            <a href="https://youtu.be/g80nPEucsuM" class="video-gallery-popup"><img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/yo-soy-lucero.jpg" alt="Yo soy Lucero"></a>
                            <a href="https://youtu.be/dJZUAs1JVhM" class="video-gallery-popup"><img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/mariachi-fiesta2.jpg" alt="Mariachi Fiesta"></a>
                            <a href="https://youtu.be/tNJShf5mnCc" class="video-gallery-popup"><img src="<?php echo esc_url( get_template_directory_uri() );?>/dist/img/mariachis/galeria/mariachi-fiesta.jpg" alt="Mariachi Fiesta"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Video Area End-->

        <!--Blog Area Start-->
        <div id="blog-area" class="blog-area">
            <div class="container">
            
            <!--Section Title Start-->
                <div class="row">
                    <div class="section-title section-title-dark text-center col-xs-12 mb-80">
                        <h2>Blog <span>Mariachi</span></h2>
                    </div>
                </div>
            <!--Section Title End-->
            
            <!--Ganpoka Blog Start-->
                <div class="row">
                    <?php 
                        $argumentos = array(
                                'post_status'       => 'publish',
                                'orderby'           => 'date',
                                'order'             => 'DESC',
                                'posts_per_page'    => 2
                            );
                        $productos = null;	
                        $productos = new WP_Query($argumentos);

                        $posteos = $productos->posts;;
                    ?>
                    <?php foreach($posteos as $items) : ?>
                    <div class="col-md-6 col-xs-12 mb-30">
                        <div class="blog-item">
                            <div class="blog-image">
                                <?php
                                    $src = null;
                                    $thumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($items->ID), 'medium');
                                    $src = $thumb_src['0'];
                                    if($src) : ?>
                                        <a href="<?php get_site_url() ?>/<?php echo $items->post_name ?>" class="img-enlace">
                                            <img loading="lazy" width="100%" height="190" class="img-fluid" src="<?php echo $src; ?>" alt="<?php echo $items->post_title ?>" />
                                        </a>
                                <?php endif ?>
                            </div>
                            <div class="blog-bottom">
                                <h3><a href="javascript:void(0)"><?php echo $items->post_title ?></a></h3>
                                <a href="<?php get_site_url() ?>/<?php echo $items->post_name ?>" class="read-more">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            <!--Ganpoka Blog End-->
                <div class="text-center bloq-vermas">
                    <a class="vermas" href="<?php echo get_site_url()?>/blog">Ver más</a>
                </div>
            </div>
        </div>
        <!--Blog Area End-->
    </div>
    <!-- Body main wrapper end -->
</div>
<?php get_footer(); ?>