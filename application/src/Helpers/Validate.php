<?php

namespace Helpers;

class Validate
{
    public static function int($var)
    {
        return filter_var($var, FILTER_VALIDATE_INT);
    }
}
