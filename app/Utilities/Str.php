<?php

namespace App\Utilities;

class Str{

    /**
     * Method to generate unique random string
     *
     * @return string
     */
    public static function random()
    {
        return md5(uniqid(rand(), true));
    }
}