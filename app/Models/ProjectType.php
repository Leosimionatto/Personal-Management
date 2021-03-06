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
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table Attributes
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nmtipo', 'criado_em', 'atualizado_em'
    ];
}
