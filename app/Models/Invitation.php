<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    protected $primaryKey = 'UUID';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'UUID',
        'status',
        'email',
        'colocation_id',
    ];

    public function colocation(): BelongsTo
    {
        return $this->belongsTo(Colocation::class);
    }
}
