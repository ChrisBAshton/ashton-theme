</section>

</div><!-- main -->

<div id="terminal-placeholder" data-loaded="false" data-active="false">
    <p id="terminal-loading">Loading...</p>
</div>

</div><!-- container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script>
(function () {
    window.addEventListener('keydown', function (e) {
        var terminalContainer = document.getElementById('terminal-placeholder');
        var keyCodeForCtrl = 17;
        var keyCodeForLetterT = 84;
        if (e.shiftKey && e.keyCode === keyCodeForCtrl) {
            terminalContainer.dataset.active = terminalContainer.dataset.active === "false";

            if (terminalContainer.dataset.active && terminalContainer.dataset.loaded === "false") {
                var iframe = document.createElement('iframe');
                iframe.setAttribute('src', '//chrisbashton.github.io/js-terminal/');
                iframe.onload = function () {
                    terminalContainer.dataset.loaded = true;
                };
                terminalContainer.appendChild(iframe);
            }
        }
    });
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
Site powered by the <a href="http://api.ashton.codes/">Ashton API</a> (last updated <?= ChrisApi::apiLastUpdated(); ?>). <span class="desktop-only">Think that's nerdy? Try <code>SHIFT + CTRL</code> to open the terminal.</span> All rights reserved.
</footer>

<?php wp_footer(); ?>

</body>
</html>
