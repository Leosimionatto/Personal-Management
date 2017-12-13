<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    /**
     * @var string
     */
    protected $table = 'tecnologia';

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
        'id', 'nome', 'criado_em', 'atualizado_em'
    ];
}
