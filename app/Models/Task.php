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
     * @var array
     */
    protected $fillable = [
        'nmtarefa', 'descricao', 'idprioridade', 'idsituacao', 'idprojeto', 'idgrupo', 'idparticipante', 'qtdetapas', 'dtentrega', 'criado_em', 'atualizado_em'
    ];

    /**
     * Method to get related participant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function participant()
    {
        return $this->belongsTo('App\Models\Participant', 'idparticipante', 'id');
    }

}