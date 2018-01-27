<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepHist extends Model{
    /**
     * Database Table
     *
     * @var string
     */
    protected $table = 'etapahist';

    /**
     * Database Table Primary Key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Database Table Columns
     *
     * @var array
     */
    protected $fillable = [
        'idetapa', 'descricao', 'idparticipante', 'criado_em', 'atualizado_em'
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
}