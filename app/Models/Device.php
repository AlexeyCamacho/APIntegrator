<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    public function errors(): MorphMany
    {
        return $this->morphMany(Error::class, 'errortable');
    }

    public function activeErrors(): BelongsToMany
    {
        return $this->belongsToMany(Error::class)->withTimestamps();
    }

    public function statuses(): MorphMany
    {
        return $this->morphMany(Status::class, 'statustable');
    }

    public function activeStatuses(): BelongsToMany
    {
        return $this->belongsToMany(Status::class)->withTimestamps();
    }

    public function settings(): MorphOne
    {
        return $this->morphOne(Setting::class, 'settings_table');
    }
}
