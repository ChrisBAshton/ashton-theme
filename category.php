<?php require('header.php'); ?>

<?php if (have_posts()) :?>
    <?php $i = 0; while(have_posts()) : the_post(); $i++; ?>

    <article class="<?php $classes = get_post_class(); foreach($classes as $class) { echo $class . ' '; } ?> selfclear">
        <div class="post__summary">
            <h2 class="post__summary-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <div class="post__summary-date"><?php the_time('d F Y'); ?></div>
        </div>
        
        <?php
            if ( has_post_thumbnail() ) {
                echo "<div class='post__summary-thumb'>";
                the_post_thumbnail(array(150,150));
                echo "</div>";
            }
        ?>

        <div class="post__summary-excerpt">
            <?php the_excerpt(); ?>
        </div>
    </article>

    
    <?php endwhile; ?>
    
    <div class="pagination">
        <p class="older"><?php next_posts_link('Older posts'); ?></p>
        <p class="newer"><?php previous_posts_link('Newer posts'); ?></p>
    </div>
    
<?php else : ?>
    <h2>Nothing Found</h2>
    <p>Sorry, but you are looking for something that isn't here.</p>
    <p><a href="<?php get_option('home'); ?>">Return to homepage</a></p>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php require('footer.php'); ?>