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
     * Database Table Columns
     *
     * @var array
     */
    protected $fillable = [
        'idemitente', 'iddestinatario', 'conteudo', 'criado_em', 'visualizado_em'
    ];

}