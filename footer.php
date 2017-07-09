</section>

</div><!-- main -->
</div><!-- container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script>
(function () {
$(document).ready(function () {
    $('.submenu_toggle').on('click', function (e) {
        e.preventDefault();
        $(this).parent().find('.submenu').toggleClass('submenu--hover');
        return false;
    });
});
}());
</script>

<footer>
Site powered by the <a href="//api.ashton.codes/">Ashton API</a> (last updated <?= ChrisApi::apiLastUpdated(); ?>). Think that's nerdy? <a href="//terminal.ashton.codes">Try the terminal</a>. All rights reserved.
</footer>

<?php wp_footer(); ?>

</body>
</html>
