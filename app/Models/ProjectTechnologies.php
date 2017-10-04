<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTechnologies extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tecnologiasprojeto';

    public $timestamps = false;

    protected $fillable = [
        'idtecnologia', 'idprojeto'
    ];
}
