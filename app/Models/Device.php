<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'login',
        'name',
        'description',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}