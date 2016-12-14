<?php get_header(); ?>
<div id="main">

	<h2>Search results for <?php the_search_query(); ?></h2>

	<?php if (have_posts()) : ?>
		<?php if (is_category()) { ?>
			<h2 class="title"><?php single_cat_title(); ?></h2>
		<?php } elseif (is_month()) { ?>
			<h2 class="title"><?php the_time('F, Y'); ?></h2>
		<?php } ?>

	<!-- Almost Same as index.php from here on -->
	<?php while(have_posts()) : the_post(); ?>

		<div <?php post_class() ;?>>
			<div class="date">
				<p><?php the_time('d'); ?> <span><?php the_time('M'); ?></span></p>
			</div>

			<div class="post-content">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</div>
		</div>

		<?php endwhile; ?>

		<div class="pagination">
			<p class="older"><?php next_posts_link('Older posts'); ?></p>
			<p class="newer"><?php previous_posts_link('Newer posts'); ?></p>
		</div>

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
