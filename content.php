<article id="post-<?=$post->ID; ?>"  class="col-md-6">
	<?php
	if(has_post_thumbnail()){
		$thumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
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