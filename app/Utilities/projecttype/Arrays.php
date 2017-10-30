<?php

namespace App\Utilities\ProjectType;

use App\Models\ProjectType;

class Arrays{

    /**
     * Method to get all types
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function types()
    {
        return ProjectType::all();
    }
}