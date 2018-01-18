<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model{

    /**
     * @var string
     */
    protected $table = 'tarefa';

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
        'nmtarefa', 'descricao', 'idprioridade', 'idsituacao', 'idprojeto', 'idgrupo', 'idparticipante', 'qtdetapas', 'dtentrega', 'criado_em', 'atualizado_em', 'idatribuidor'
    ];

    /**
     * Method to get related Participant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function participant()
    {
        return $this->belongsTo('App\Models\Participant', 'idparticipante', 'id');
    }

    /**
     * Method to get related Assigner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assigner()
    {
        return $this->belongsTo('App\Models\User', 'idatribuidor', 'id');
    }

    /**
     * Method to get related Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'idprojeto', 'id');
    }

}