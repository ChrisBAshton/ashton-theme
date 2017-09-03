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
				// echo ChrisApi::name();
				echo get_bloginfo('name') . ' » ' . get_bloginfo('description');
			}
		?></title>
		<link rel="shortcut icon" href="/css/favicon.ico" />
		<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<link href='<?= get_template_directory_uri(); ?>/css/compiled.php' rel='stylesheet' type='text/css'>
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />

        <?php wp_head(); ?>
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
