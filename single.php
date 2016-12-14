<?php get_header(); ?>

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

			<div class="bio">
				<div class="bio__image">
	        		<?php echo get_avatar(get_the_author_email(), 150); ?>
	        	</div>
				<div itemscope itemtype="http://data-vocabulary.org/Person" class="vcard author post-author">
					<time class="published updated post-date" datetime="<?php echo get_the_time('Y-m-d H:i:s'); ?>"><?php the_time('jS F, Y'); ?></time>
					<strong><span class="fn">Chris Ashton</span></strong>
					<span itemprop="photo" style="display: none"><?=ChrisApi::picture(); ?></span>
					<span itemprop="url" style="display: none">http://ashton.codes</span>
					<span itemprop="role" style="display: none">Test Engineer</span>
					<span itemprop="address" style="display: none"><?=ChrisApi::location(); ?></span>
					<span itemprop="affiliation" style="display: none">Webdapper</span>
			        <div class="bio__description">
			            <?php the_author_meta('description'); ?>
			        </div>
				</div>
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
<?php get_footer(); ?>
