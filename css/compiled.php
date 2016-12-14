<?php
  // written in PHP, for kicks.
  // ...also to save an offline pre-processing step, and to save the client from having to make multiple requests to the server for my modular CSS.

  header('Content-type: text/css');
  ob_start("compress");
  function compress($buffer) {
    /* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    /* remove tabs, spaces, newlines, etc. */
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    /* reference css assets */
    $buffer = str_replace('[THEME_ROOT]', '/blog/wp-content/themes/ashton', $buffer);
    return $buffer;
  }

  /* your css files */
  include('main__defaults.css');
  include('main__utils.css');
  include('main__classes.css');
  include('main__wordpress.css');
  include('main__media--976.css');

  ob_end_flush();
