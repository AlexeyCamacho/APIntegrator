<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'settings'
    ];

    protected $casts = [
        'settings' => 'array'
    ];

    public function settings_table(): MorphTo
    {
        return $this->morphTo();
    }

    public function settings(array $revisions, bool $save = true) : self
    {
        $this->settings = array_merge($this->settings, $revisions);
        if ($save) {
            $this->save();
        }

        return $this;
    }

}
