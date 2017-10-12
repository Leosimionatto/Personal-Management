<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    /**
     * Database Table
     *
     * @var string
     */
    protected $table = 'tpprojeto';

    /**
     * Table Primary Key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Table Attributes
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nmtipo', 'created_at', 'updated_at'
    ];
}
