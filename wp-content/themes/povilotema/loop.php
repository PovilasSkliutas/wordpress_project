<?php $x=0; if (have_posts()): while (have_posts()) : the_post(); $x++?>
	<!-- Bus daugiau nei vienas article -->
	<article>
		<!-- Jeigu straipsnis turi featured paveiksleli, tai ji rodome -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php if (is_home()) {
					the_post_thumbnail('home-paveikslelis'); // Jeigu yra home-page rodo home dydzio paveiksleli
				} else {
					the_post_thumbnail('didelis-paveikslelis'); // Jkitu atveju rodo didelio dydzio paveiksleli
				} ?>
			</a>
		<?php endif; ?>

		<!-- Rodome straipsnio pavadinima, kaip nuoroda -->
		<h3>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h3>

		<!-- Reikia isvesti straipsnio turini, o dar geriau, kaip intro turini -->
		<p><?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?></p>
	</article>

	<?php if (is_home() && $x==2) {$x = 0;?>
		<div class="clear"></div>
	<?php } ?>

<?php endwhile; ?>

<?php else: ?>
	<!-- article -->
	<article>
		<h2>
			<?php _e('Atsiprašau, bet nėra ką rodyti!', 'povilotema') ?>
		</h2>
	</article>
	<!-- /article -->
<?php endif; ?>
