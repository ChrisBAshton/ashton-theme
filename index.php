<?php require('header.php'); ?>

    <div class="homepage">
        <h3><?=$chris->description(); ?></h3>

        <div class="container" style="border: 0; margin: 60px auto 40px;">
            <div class="quote-icon quote-icon--blog"></div>
            <div class="blog__snippet">
                <a href="<?=$chris->blogUrl(); ?>"><h2><?=$chris->blogTitle(); ?></h2>

                <p class="quote"><?=$chris->blogExcerpt(); ?></p></a>
            </div>
        </div>

        <div class="col-md-6">
            <img class="header__image" src="<?=$chris->picture(); ?>" alt="<?= $chris->name(); ?>" />
            <ul class="bulletless">
                <li>
                    <span class="impact">Status:</span> <?=$chris->availability(); ?>
                </li>
                <li>
                    Living in <span class="impact"><?=$chris->location(); ?></span>
                </li>
                <li>
                    Been coding <span class="impact"><?=number_format($chris->codingDays()); ?></span> days
                </li>
                <li>
                    <?php
                    $grad = $chris->daysUntilGraduation();
                    if ($grad === 0) {
                        echo "I'm graduating today!!!";
                    }
                    elseif ($grad < 0) {
                        echo 'Graduated <span class="impact">' . abs($grad) . '</span> days ago';
                    }
                    else {
                        echo 'Graduating in <span class="impact">' . $grad . '</span> days';
                    }
                    ?>
                </li>
            </ul>

        </div>
        <div class="col-md-6">
            <?php
                echo apply_filters('the_content', 'http://twitter.com/ChrisBAshton/status/' . $chris->tweet());
            ?>
        </div>
    </div>

<?php get_sidebar(); ?>
<?php require('footer.php'); ?>