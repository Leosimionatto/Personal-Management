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

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'nome', 'descricao', 'situacao', 'tipo_projeto', 'prioridade', 'dtentrega', 'idusuario', 'documento', 'email', 'criado_em', 'atualizado_em'
    ];

    /**
     * Method to get related technologies
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function technologies()
    {
        return $this->hasMany(ProjectTechnologies::class, 'idprojeto', 'id');
    }
}
