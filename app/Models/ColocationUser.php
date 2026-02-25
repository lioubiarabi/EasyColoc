<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColocationUser extends Model
{
    protected $table = 'colocation_user';

    public $timestamps = false;

    protected $casts = [
        'is_admin' => 'boolean',
        'left_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
