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
    protected $table = 'projeto';

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
        'nmprojeto', 'descricao', 'idsituacao', 'idtpprojeto', 'idprioridade', 'dtentrega', 'idusuario', 'criado_em', 'atualizado_em'
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

    /**
     * Get related user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'idusuario', 'id');
    }
}
