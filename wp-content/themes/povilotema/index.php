<?php get_header(); ?>

	<section class="article-list homepage">
		<h1><?php _e( 'Naujausi įrašai', 'povilotema' ); ?></h1>
		<?php get_template_part('loop'); ?>
	</section>

	<?php get_template_part('pagination'); ?>

<?php get_footer(); ?>
