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
    protected $table = 'tecnologiaprojeto';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'idtecnologia', 'idprojeto'
    ];
}
