<?php get_header(); ?>
<main role="blog">
	<section id="article-view" class="padding single-page">
		<div class="container">
			<article id="post-<?=$post->ID; ?>" <?php post_class(); ?>>
				<div class="head">
					<h1 class="title"><?php the_title(); ?></h1>
				</div>
				<div class="body">
					<div class="post-meta">
						<div class="">
							<?php $current_url = get_author_posts_url( get_the_author_meta('ID') ); ?>
							<a href="<?php echo $current_url; ?>" class="perfil-author">
								<div class="img-author">
									<?php echo get_avatar( get_the_author_meta('ID'), 60); ?>
								</div>
								<div class="text-author">
									<?php the_author(); ?>
								</div>
							</a>
						</div>
						<!--div class="text-right float-right">
							<div class="article-count">
								<i class="far fa-eye"></i>
								<?php echo setPostViews($post->ID);?>
							</div>
						</div-->
					</div>
					<?php
					if(has_post_thumbnail()){
						$thumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single');
						$src = $thumb_src['0'];
						$src_t = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
					}
					if($src){?>
					<div class="img">
						<img src="<?php echo $src; ?>" alt="<?php echo @$src_t; ?>" />
					</div>
					<?php }?>
					<div class="text">
						<?php
						if (have_posts()){
							while (have_posts()) {
								the_post();
								# setPostViews($post->ID);
								the_content();
							}
						}
						?>
					</div>
					<div class="pie">
						<p class="entry-meta">
							<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) { ?>
							<span>Categoría: <?php echo get_the_category_list( _x( ', ', '', 'base' ) ); ?></span>
							<?php } ?>
						</p>
					</div>
					<div id="valoracion">
						<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
					</div>
					<div class="navigation">
						<div class="">
							<?php previous_post_link('%link', '<span class="btn btn-dradient"> < Anterior</span>'); ?>
						</div>
						<div class="">
							<?php next_post_link('%link', '<span class="btn btn-dradient">Siguente > </span>'); ?>
						</div>
					</div>

				</div>
			</article>
		</div>
	</section>
	<section id="comments-fb" class="bg-light padding">
		<div class="container">
			<div class="fb-comments" data-href="<?=get_permalink();?>" data-width="100%" data-numposts="8"></div>
		</div>
	</section>

	<?php
	$terms = get_the_terms( $post->ID, 'category');
	$categ = array();
	if ($terms){
		foreach ($terms as $term) {
			$categ[] = $term->term_id;
		}
	}

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
	<section id="article-also" class="padding bg-dradient">
		<div class="container">
			<div class="head">
				<h2>También te puede interesar</h2>
			</div>
			<div class="body">
				<div class="row">
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
								the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" >', '</a></h3>' );
								?>
								<p><?php echo limitar_caracters(150);  ?></p>
							</div>
						</article>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

</main>
<?php get_footer(); ?>