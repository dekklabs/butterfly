<?php
/**
 * Template Name: Page
 *
 * @package WordPress
 * @subpackage base
 * @since base 1.0
 */

get_header(); ?>
<main role="blog">
	<section id="article-recents" class="cur padding">
		<div class="container">
			<div class="head row">
				<div class="col-8">
					<h1><?php single_cat_title(); ?></h1>
				</div>
				<div class="col-4">
					<form class="form-inline" role="search" method="get" action="<?=site_url();?>">
						<div  class="form-group mx-sm-3 mb-2">
							<input type="text" value="<?=@$_GET['s'];?>" name="s" id="s" placeholder="Buscar..." class="form-control">
						</div>
						<button type="submit" class="btn btn-dradient mb-2">Buscar</button>
					</form>
				</div>
			</div>
			<?php if ( have_posts() ) { ?>
			<div class="body">
				<div class="row">
					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'content', get_post_format() );
					}
					?>
				</div>
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

</main>

<?php get_footer(); ?>