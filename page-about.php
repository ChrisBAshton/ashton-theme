<?php get_header(); ?>

<h1>About</h1>

<h2 class="aligncenter"><?= ChrisApi::description(); ?></h2>

<?= ChrisApi::resume(); ?>

<p><a href="<?= ChrisApi::linkedin(); ?>" target="_blank" style="float: right">[Continue reading on LinkedIn]</a></p>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
