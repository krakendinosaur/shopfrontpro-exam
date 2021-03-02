<?php

namespace Helpers;

class Input
{
    public static function get($param)
    {
        $input = '';

        if (isset($_GET[$param])) {
            $input = $_GET[$param];
        }

        return $input;
    }

    public static function post($param)
    {
        $input = '';

        if (isset($_POST[$param])) {
            $input = $_POST[$param];
        }

        return $input;
    }

    public static function cli($param, $type = ':')
    {
        // : required
        // :: optional
        // blank no value

        $params = getopt(null, array($param . $type));

        if (!empty($params[$param])) {
            return $params[$param];
        }

        return null;
    }

    public static function isCli()
    {
        return (PHP_SAPI === 'cli' OR defined('STDIN'));
    }
}
