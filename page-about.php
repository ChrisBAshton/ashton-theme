<?php get_header(); ?>

<h1>About</h1>

<style>
.linkedin-preview {
    margin-top: 1em;
    display: flex;
    align-items: flex-start;
    flex-wrap: wrap;
    border-radius: 5px;
    padding: 1em;
    box-shadow: 0 0 0 1px rgb(0 0 0 / 15%), 0 2px 3px rgb(0 0 0 / 20%);
    position: relative;
}

.linkedin-preview__logo {
    position: absolute;
    top: 5px;
    right: 5px;
    background: url('/blog/wp-content/themes/ashton/css/icons.png') no-repeat;
    background-position: -222px -106px;
    width: 35px;
    height: 35px;
    padding: 20px;
    display: inline-block;
    background-size: 400px auto;
}

.linkedin-preview__thumbnail {
    max-width: 100px;
    padding: 0 20px 0 0;
}

.linkedin-preview__thumbnail img {
    border-radius: 50%;
}

.linkedin-preview__text {
    flex: 0.9;
}

.linkedin-preview__cta {
    text-align: right;
    margin-bottom: 0;
}
</style>

<div class="linkedin-preview">
    <div class="linkedin-preview__logo"></div>
    <div class="linkedin-preview__thumbnail">
        <img src="<?= ChrisApi::picture(); ?>" alt="Chris Ashton" />
    </div>

    <div class="linkedin-preview__text">
        <?= ChrisApi::resume(); ?>

        <p class="linkedin-preview__cta"><a href="<?= ChrisApi::linkedin(); ?>" target="_blank">[Continue reading on LinkedIn]</a></p>
    </div>
</div>

<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <div <?php post_class(); ?>>
        <?php the_content(''); ?>
    </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
