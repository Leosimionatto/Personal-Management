<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
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

    protected $fillable = [
        'nome', 'documento', 'email', 'criado_em', 'atualizado_em'
    ];
}
