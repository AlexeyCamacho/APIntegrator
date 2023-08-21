<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Error extends Model
{
    use HasFactory;

    public function errortable(): MorphTo
    {
        return $this->morphTo();
    }
}
