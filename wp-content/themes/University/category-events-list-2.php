<?php

/**
 *
 * Category page
 *
 **/

global $gk_tpl;

gk_load('header');
gk_load('before');

?>

<section id="gk-mainbody" class="category-events">
	<?php if ( have_posts() ) : ?>
	
		<?php if ( category_description() ) : // Show an optional category description ?>
		<h1 class="page-title">
			<?php echo single_cat_title( '', false ); ?>
		</h1>
		
		<div class="page-desc">
			<?php echo category_description(); ?>
		</div>
		<?php endif; ?>
			
		<?php do_action('gavernwp_before_loop'); ?>
	
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'event' ); ?>
		<?php endwhile; ?>

		<?php gk_content_nav(); ?>
		
		<?php do_action('gavernwp_after_loop'); ?>
	
	<?php else : ?>
	
		<h1 class="page-title">
			<?php _e( 'Nothing Found', GKTPLNAME ); ?>
		</h1>
	
		<section class="intro">
			<?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', GKTPLNAME ); ?>
		</section>
		
		<?php get_search_form(); ?>
		
	<?php endif; ?>
</section>

<?php

gk_load('after');
gk_load('footer');

// EOF