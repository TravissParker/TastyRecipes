<?php

namespace tsrc\Util;

class InputValidator
{
    public static function fieldIsEmpty($string)
    {
        return (empty($string) ? true : false);
    }

    public static function stringsNotEqual($string1, $string2)
    {
        return 0 !== strcmp($string1, $string2) ? true : false;
    }

    public static function vetInput($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlentities($input);
        return $input;
    }
}