<?php

get_header(); ?>
<main>
    <section id="article-recents" class="cur padding">
        <div class="container">
            <div class="head row">
                <div class="col-xs-12 col-md-8">
                    <?php if ($paged <= 1) { ?>
                    <h2><b>Articulos</b> Recientes:</h2>
                    <?php }else{ ?>
                    <h2>Pagina <?php echo $paged;?></h2>
                    <?php } ?>
                </div>
                <div class="col-md-4 d-none-sm">
                    <form class="form-inline" role="search" method="get" action="<?=site_url();?>">
                        <div  class="form-group mx-sm-3 mb-2">
                            <input type="text" value="<?=@$_GET['s'];?>" name="s" id="s" placeholder="Buscar..." class="form-control">
                        </div>
                        <button type="submit" class="btn btn-dradient mb-2">Buscar</button>
                    </form>
                </div>
            </div>
            <?php if ( have_posts() ) { ?>
            <div class="body row">
            <?php
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'content', get_post_format() );
                }
            ?>
            </div>
        <?php
            if (function_exists("wp_bs_pagination")){
                echo '<div class="footer">';
                echo wp_bs_pagination();
                echo '</div>';
            }
            ?>
        <?php } ?>
        </div>
    </section>
<?php
    if ($paged <= 1) { ?>
    <?php
    // poner el id de marketing digital
    $categ = array(4);

    if (count($categ) > 0) {
        $loop	= new WP_QUERY(array(
            'category__in'		=> $categ,
            'posts_per_page'	=> 6,
            'post__not_in'		=>array(get_the_ID()),
            'orderby'			=>'rand'
        ));
    }
    ?>
    <?php if ( $loop->have_posts() ){ ?>
    <section id="article-interesant" class="cur padding bg-light">
        <div class="container">
            <div class="head">
                <h2><b>También</b> puede interesarte:</h2>
            </div>
            <div class="body row">
                <?php
                while ( $loop->have_posts() ){
                    $loop->the_post();
                    $npost = $loop->post;
                    ?>
                    <article id="post-<?=$npost->ID; ?>"  class="col-lg-4 col-md-6 col-sm-6 bloq" >
                        <?php
                        $src = null;
                        if(has_post_thumbnail()){
                            $thumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($npost->ID), 'medium');
                            $src = $thumb_src['0'];
                        }
                        if($src){?>
                        <a class="img custom-hover" href="<?=esc_url( get_permalink() ) ;?>">
                            <img src="<?php echo $src; ?>" alt="<?php echo @$src_t; ?>" />
                        </a>
                        <?php } ?>
                        <div class="text">
                            <?php
                            if ( is_single() ) {
                                the_title( '<h3 class="entry-title">', '</h3>' );
                            }else{
                                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" >', '</a></h3>' );
                            }
                            ?>
                            <p><?php echo limitar_caracters(270);  ?></p>
                            <div class="category">
                                <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) { ?>
                                <?php echo get_the_category_list( _x( ' ', '', 'base' ) ); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </article>
            <?php
                }
            ?>
            </div>
            <div class="footer text-center mt-3">
                <a href="#" class="btn btn-dradient">Ver más artículos</a>
            </div>
        </div>
    </section>
<?php } ?>
<?php } ?>

</main>

<?php get_footer(); ?>