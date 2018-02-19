<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    /**
     * Database Table
     *
     * @var string
     */
    protected $table = 'mensagem';

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
        'idemitente', 'iddestinatario', 'conteudo', 'criado_em', 'atualizado_em', 'visualizado_em'
    ];

    /**
     * M
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function issuer()
    {
        return $this->belongsTo(User::class, 'idemitente', 'id');
    }

    /**
     * Method to get related Recipient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipient()
    {
        return $this->belongsTo(User::class, 'iddestinatario', 'id');
    }

}