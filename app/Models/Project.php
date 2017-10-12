<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projetos';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'nome', 'descricao', 'situacao', 'tipo_projeto', 'prioridade', 'dtentrega', 'idusuario', 'documento', 'email', 'criado_em', 'atualizado_em'
    ];
}
