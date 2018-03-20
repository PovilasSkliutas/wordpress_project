
				<div class="clear"></div>
			</div>
		</main>
		<div class="customer-logos container">
			<!-- customers logos -->
			<?php
				$args = array(
					'post_type' => 'clients',
					'post_status' => 'publish',
				);

				$clients = new WP_Query( $args );
				if ($clients->have_posts() ) :
					while ($clients->have_posts() ) :
						$clients->the_post();
						// veikia visos default wp_funkcijos: the_title; the_post_thumbnail();
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('logos');
						}
					endwhile;
					wp_reset_postdata();
				endif;
			?>
		</div>
		<footer>
			<div class="container">
				<div class="legal">&copy; <?php _e('Mano pirmasis Wordpress tinklalapis', 'povilotema') ?> <?php echo date('Y') ?></div>
				<div class="social-links">
					<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_sidebar')) ?>
				</div>
				<div class="clear"></div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
