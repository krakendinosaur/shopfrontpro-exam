<?php
ini_set('date.timezone', 'Asia/Manila');

define('ROOTPATH', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('APPPATH', ROOTPATH . 'application' . DIRECTORY_SEPARATOR);

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    $path = dirname(__FILE__)
        . DIRECTORY_SEPARATOR
        . 'src'
        . DIRECTORY_SEPARATOR
        . $class
        . '.php';

    if (is_readable($path)) {
        require_once($path);
    }
});
