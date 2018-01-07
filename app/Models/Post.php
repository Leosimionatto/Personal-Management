<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Database Table
     *
     * @var string
     */
    protected $table = 'cargo';

    /**
     * Database Table Primary Key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Database Table Columns
     *
     * @var array
     */
    protected $fillable = [
        'nmcargo', 'stcargo'
    ];
}
