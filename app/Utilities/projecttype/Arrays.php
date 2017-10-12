<?php

namespace App\Utilities\ProjectType;

use App\Models\ProjectType;

class Arrays{

    public static function types()
    {
        return ProjectType::all();
    }
}