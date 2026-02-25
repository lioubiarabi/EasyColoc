<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'reputation'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_global_admin' => 'boolean',
        'reputation' => 'integer',
        'password' => 'hashed',
    ];

    public function colocations(): BelongsToMany
    {
        return $this->belongsToMany(Colocation::class, 'colocation_user')
            ->withPivot('id', 'is_admin', 'left_at', 'created_at');
    }


    public function settlements(): HasMany
    {
        return $this->hasMany(Settlement::class);
    }

    public function hasActiveColocation(): bool
    {
        return $this->colocations()->wherePivotNull('left_at')->exists();
    }
}
