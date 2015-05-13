<?php require('header.php'); ?>

	<?php
	$args = array(
		'category' => 2,
		'posts_per_page' => -1
	);
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post);
	?>

	<article class="<?php $classes = get_post_class(); foreach($classes as $class) { echo $class . ' '; } ?> selfclear">
		<div class="post__summary">
			<h2 class="post__summary-title">
				<a href="<?php the_permalink(); ?>">
					<?php if ($i === 1) echo '<!-- latest_blog_begin--title -->';  ?> 
					<?php the_title(); ?>
					<?php if ($i === 1) echo '<!-- latest_blog_end--title -->';  ?> 
				</a>
			</h2>
			<div class="post__summary-date"><?php the_time('d F Y'); ?></div>
		</div>
		
		<?php
			$thumbUrl = get_post_meta(get_the_id(), 'thumbnail_300x300', true);

			if (strlen($thumbUrl) == 0) {
				$thumbUrl = 'http://chrisashton.co/blog/wp-content/uploads/portfolio.png';
			}

			echo "<a class='post__summary-thumb' href='" . get_permalink() . "'>";
			echo '<img src="' . $thumbUrl . '" />';
			echo "</a>";

			// if ( has_post_thumbnail() ) {
			// 	echo "<div class='post__summary-thumb'>";
			// 	the_post_thumbnail(array(300,300));
			// 	echo "</div>";
			// }
		?>
		
		<div class="post__summary-excerpt">
			<p>
				<?php if ($i === 1) echo '<!-- latest_blog_begin--excerpt -->';  ?> 
				<?php echo get_the_excerpt(); ?>
				<?php if ($i === 1) echo '<!-- latest_blog_end--excerpt -->';  ?> 
			</p>
		</div>
	</article>
	
	<?php endforeach; ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$(document).ready(function () {
		$('.post__summary, .post__summary-date, .post__summary-excerpt').hide();
		$('.post').css('float', 'left');
		$('.post__summary-thumb').each(function () {
			var title = $(this).parent().find('.post__summary-title').text();
			$(this).append('<div class="post__summary-interactive"><p class="post__summary-interactive_text">' + title + '</p></div>');
		});
	});
</script>

<?php get_sidebar(); ?>
<?php require('footer.php'); ?>