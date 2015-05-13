<?php require('header.php'); ?>

<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>

	<?php
		$customCSS = get_post_meta(get_the_id(), 'custom_css', true);
		if ($customCSS !== '') {
			echo "<style>" . $customCSS . "</style>";
		}
	?>

	<div <?php post_class('hfeed'); ?>>
		<article class="hentry">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php //###################### BE VERY CAREFUL about changing the following line (it's used by the Ashton API) ?>
			<div id="post-content" class="entry-content">
				<?php the_content(''); ?>
			</div>

			<div itemscope itemtype="http://data-vocabulary.org/Person" class="vcard author post-author"> 
				<span class="fn"><a href="http://ashton.codes/about" rel="author" itemprop="name">Chris Ashton</a></span>
				<span itemprop="photo"><?=$chris->picture(); ?></span>
				<span itemprop="url">http://ashton.codes</span>
				<span itemprop="role">Web developer</span>
				<span itemprop="address"><?=$chris->location(); ?></span>
				<span itemprop="affiliation">Webdapper</span>
				<time class="published updated post-date" datetime="<?php echo get_the_time('Y-m-d H:i:s'); ?>"><?php the_time('Y-m-d H:i:s'); ?></time>
			</div>
		</article>
	</div>

	<?php
		$customJS = get_post_meta(get_the_id(), 'custom_js', true);
		if ($customJS !== '') {
			echo "<script>" . $customJS . "</script>";
		}
	?>

	<?php comments_template(); ?>
	
	<?php endwhile; ?>

<?php else : ?>
	<h2>Nothing Found</h2>
	<p>Sorry, but you are looking for something that isn't here.</p>
	<p><a href="<?php get_option('home'); ?>">Return to homepage</a></p>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php require('footer.php'); ?>