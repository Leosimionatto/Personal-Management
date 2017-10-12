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

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'idtecnologia', 'idprojeto'
    ];
}
