<?php

namespace Helpers;

class StringLib
{
    public static function random($length)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle($chars), 0, $length);
    }
}
