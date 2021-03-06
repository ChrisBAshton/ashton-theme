<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="<?= strip_tags(ChrisApi::description()); ?>" />
		<title><?php
			if (function_exists("get_the_title") && !is_home()) {
				echo get_the_title();
			}
			else {
				echo get_bloginfo('name') . ' » ' . get_bloginfo('description');
			}
		?></title>
		<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
        <?php wp_head(); ?>
		<?php
			define("CSS_VERSION", "0.1.2");
			if (class_exists("InlineCacher") && InlineCacher::cached(get_template_directory_uri() . "/css/compiled.php", CSS_VERSION)) :
		?>
			<link href='<?= get_template_directory_uri(); ?>/css/compiled.php' rel='stylesheet' type='text/css'>
		<?php else: ?>
			<style
			  data-src="<?= get_template_directory_uri(); ?>/css/compiled.php"
			  data-inline-cache="<?php echo CSS_VERSION; ?>">
				<?php
				  define("CSS_SIDELOADED_FROM_HEADER", true); // to prevent it overwriting mimetype of page
				  ob_start();
				  include("css/compiled.php");
				  echo ob_get_clean();
				?>
			</style>
		<?php endif; ?>
	</head>
	<body>

		<div class="container selfclear">
			<header class="header">

			    <h1 class="header__title"><a href="/" class="header__title__link"><?=ChrisApi::name(); ?></a></h1>

				<nav class="navbar navbar-default">
					<div class="container-fluid">

						<?php
	                        wp_nav_menu(array(
	                            'theme_location' => 'main-menu',
	                            'container'      => false,
	                            'menu_class'     => 'dropdown dropdown-horizontal'
	                        ));
	                    ?>

					</div>
				</nav>

				<ul class="header__icons bulletless">
					<li class="header__icons__icon header__icons__icon--twitter">
						<a href="<?= ChrisApi::twitter(); ?>" target="_blank">
							<span class="off-screen header__icons__icon__text">Twitter</span>
						</a>
					</li>
					<li class="header__icons__icon header__icons__icon--linkedin">
						<a href="<?= ChrisApi::linkedin(); ?>" target="_blank">
							<span class="off-screen header__icons__icon__text">LinkedIn</span>
						</a>
					</li>
					<li class="header__icons__icon header__icons__icon--github">
						<a href="<?= ChrisApi::github(); ?>" target="_blank">
							<span class="off-screen header__icons__icon__text">GitHub</span>
						</a>
					</li>
				</ul>
			</header>

			<div class="main">
                <section class="container--blog">
