<?php
date_default_timezone_set('Europe/London');
get_header();
?>

<div class="homepage">
    <h3><?=ChrisApi::description(); ?></h3>

    <div class="container" style="border: 0; margin: 60px auto 40px;">
        <div class="quote-icon quote-icon--blog"></div>
        <div class="blog__snippet">
            <a href="<?=ChrisApi::blogUrl(); ?>"><h2><?=ChrisApi::blogTitle(); ?></h2>

            <p class="quote"><?=ChrisApi::blogExcerpt(); ?></p></a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img class="header__image" src="<?=ChrisApi::picture(); ?>" alt="<?= ChrisApi::name(); ?>" />
            <ul class="bulletless">
                <li>
                    <span class="impact">Status:</span> <?=ChrisApi::availability(); ?>
                </li>
                <li>
                    Living in <span class="impact"><?=ChrisApi::location(); ?></span>
                </li>
                <li>
                    Been coding <span class="impact"><?=number_format(ChrisApi::codingDays()); ?></span> days
                </li>
                <li>
                    <?php
                    $grad = ChrisApi::daysUntilGraduation();
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
                echo apply_filters('the_content', 'http://twitter.com/ChrisBAshton/status/' . ChrisApi::tweet());
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= file_get_contents('https://api.ashton.codes/oembed/?url=https://api.ashton.codes/card/instagram'); ?>
        </div>

        <div class="col-md-6">
            <?= file_get_contents('https://api.ashton.codes/oembed/?url=https://api.ashton.codes/card/github'); ?>
        </div>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
