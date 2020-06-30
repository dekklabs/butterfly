<?php
/**
 * Template Name: Page
 *
 * @package WordPress
 * @subpackage base
 * @since base 1.0
 */
get_header(); ?>
<section id="shop">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php the_title(); ?></h1>
				<div class="text">
					<?php if (have_posts()) : while (have_posts()) : the_post(); setPostViews($post->ID); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<!-- <div class="col-md-3">
				<?php //if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar')) : ?>
				<?php // endif; ?>
			</div> -->
		</div>
	</div>
</section>
<?php get_footer(); ?>