<?php get_header(); ?>

<h1>About</h1>

<h3 class="aligncenter"><?= ChrisApi::description(); ?></h3>

<?= ChrisApi::resume(); ?>

<p><a href="<?= ChrisApi::linkedin(); ?>" target="_blank" style="float: right">[Continue reading on LinkedIn]</a></p>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
