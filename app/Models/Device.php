<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class Device extends Model
{
    use HasFactory, HasApiTokens, Authenticatable;

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

    public function findForPassport(string $username): Device
    {
        return $this->where('login', $username)->first();
    }

    public function validateForPassportPasswordGrant(string $password): bool
    {
        return Hash::check($password, $this->password);
    }
}
