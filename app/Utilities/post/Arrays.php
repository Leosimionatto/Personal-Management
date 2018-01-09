<?php

namespace App\Utilities\Post;

class Arrays{

    /**
     * Method to get Post by given $id
     *
     * @param $id
     * @return mixed
     */
    public static function getPost($id)
    {
        $array = [
            1 => 'Geral',
            2 => 'Full Stack',
            3 => 'Back-end',
            4 => 'Front-end',
        ];

        return $array[$id];
    }
}