<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Participant extends Model
{
    use Notifiable;

    /**
     * Database Table
     *
     * @var string
     */
    protected $table = 'participante';

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'cargo', 'deveresdesc', 'idprojeto', 'idusuario', 'criado_em', 'atualizado_em', 'solicitapart', 'token', 'fltoken'
    ];

    /**
     * Get related project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'idprojeto', 'id');
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
