<?php

namespace tsrc\Model;

class InputValidator
{
    public static function fieldIsEmpty($string)
    {
        return (empty($string) ? true : false);
    }
    //Deprecated
    public static function fieldsEmpty($shuttle)
    {

        foreach ($shuttle->getArray() as $key => $value) {
            if (empty($value)) {
                echo '<br>empty index found for: ';
                echo $key;
                $shuttle->setErrorMsg($key, "This field is required");
//                echo $shuttle->getError('usernameError');
            }
        }
    }

    public static function stringsNotEqual($string1, $string2)
    {
//        $string1 = $shuttle->getPassword();
//        $string2 = $shuttle->getPasswordR();
        if (0 !== strcmp($string1, $string2)) {
//            $shuttle->setErrorMsg('passwordMismatch', "Passwords doesn't match");
            return true;
            }
    }
}