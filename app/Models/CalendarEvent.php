<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CalendarEvent extends Model
{
    protected $fillable = [
        'title', 'description', 'start_at', 'end_at', 'color',
    ];

    public function calendarable(): MorphTo
    {
        return $this->morphTo();
    }
}