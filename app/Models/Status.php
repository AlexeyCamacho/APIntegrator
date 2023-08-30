<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color'
    ];

    public function statustable(): MorphTo
    {
        return $this->morphTo();
    }

    public function activeDevices(): BelongsToMany
    {
        return $this->belongsToMany(Device::class)->withTimestamps();
    }
}
