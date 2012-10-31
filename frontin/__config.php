<?php

// Easy Include
define( 'PROJECT_PATH', realpath( dirname( __FILE__ ) ) );

set_include_path( implode( PATH_SEPARATOR, array(
    realpath( PROJECT_PATH ),
    realpath( PROJECT_PATH . 'parts' ),
    realpath( PROJECT_PATH . 'assets' ),
    realpath( PROJECT_PATH . 'shared' ),
    realpath( PROJECT_PATH . 'static' ),
    realpath( PROJECT_PATH . 'library' ),
    get_include_path() 
) ) );

// Minify (see functions.php)
// Useful if you implement caching.
// Comment out if you don't want 
// to minify your markup.
ob_start('frontin_minify');