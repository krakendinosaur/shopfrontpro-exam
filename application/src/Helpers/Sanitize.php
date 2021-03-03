<?php

namespace Helpers;

class Sanitize
{
    public static function reduceWhitespaces($str, $trim = false)
    {
        $str = preg_replace('/\s+/', ' ', $str);
        return ($trim === true) ? trim($str) : $str;
    }

    public static function string($str)
    {
        $str = self::reduceWhitespaces($str, true);
        return filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    }

    public static function int($var)
    {
        return filter_var($var, FILTER_SANITIZE_NUMBER_INT);
    }
}
