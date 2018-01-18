<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model{
    /**
     * @var string
     */
    protected $table = 'etapa';

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
        'nmetapa', 'idtarefa', 'idsituacao', 'descricao', 'criado_em', 'atualizado_em'
    ];
}