<?php

namespace Helpers;

class Input
{
    public static function get($param)
    {
        $input = '';

        if (isset($_GET[$param])) {
            $input = $_GET[$param];
        } elseif (isset($_POST[$param])) {
            $input = $_POST[$param];
        }

        return $input;
    }

    public static function isCli()
    {
        return (PHP_SAPI === 'cli' OR defined('STDIN'));
    }
}
