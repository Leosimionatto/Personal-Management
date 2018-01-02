<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model{

    /**
     * @var string
     */
    protected $table = 'notifications';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'type', 'notifiable_id', 'notifiable_type', 'data', 'created_at', 'read_at', 'updated_at'
    ];

}