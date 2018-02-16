<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model{
    /**
     * Database Table
     *
     * @var string
     */
    protected $table = 'etapa';

    /**
     * Database Table Primary Key
     *
     * @var string
     */
    protected $primaryKey = 'id';

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
        'nmetapa', 'idtarefa', 'idsituacao', 'descricao', 'tempogasto', 'criado_em', 'atualizado_em'
    ];

    /**
     * Method to get related history
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history()
    {
        return $this->hasMany('App\Models\StepHist', 'idetapa', 'id');
    }

    /**
     * Method to get related Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'idtarefa', 'id');
    }
}