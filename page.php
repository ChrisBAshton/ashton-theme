<?php get_header(); ?>
	<div id="main">

		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>

			<div <?php post_class(); ?>>
				<h2><?php the_title(); ?></h2>
				<?php the_content(''); ?>
			</div>

			<?php endwhile; ?>

		<?php else : ?>
			<div class="post">
				<h2>Nothing Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
				<p><a href="<?php get_option('home'); ?>">Return to homepage</a></p>
			</div>
		<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
