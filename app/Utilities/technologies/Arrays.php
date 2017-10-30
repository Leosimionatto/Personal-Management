<?php

namespace App\Utilities\Technologies;

use App\Models\Technologies;

class Arrays{

    /**
     * Method to get technologies
     *
     * @return array
     */
    public static function technologies()
    {
        return Technologies::all();
    }

    /**
     * Method to check if technology was selected
     *
     * @param $technologies
     * @param $key
     * @return string
     */
    public static function selected($technologies, $key)
    {
        foreach($technologies as $technology){
            if($technology['idtecnologia'] == $key){
                return 'selected';
            }
        }

        return '';
    }
}