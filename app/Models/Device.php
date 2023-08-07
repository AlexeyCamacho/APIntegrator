<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Passport\HasApiTokens;

class Device extends Model
{
    use HasFactory, HasApiTokens;

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

    public function findForPassport(string $username): User
    {
        return $this->where('login', $username)->first();
    }
}
