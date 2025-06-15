<?php

namespace App\Traits;

use App\Models\CalendarEvent;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasCalendar
{
    public function calendarEvents(): MorphMany
    {
        return $this->morphMany(CalendarEvent::class, 'calendarable');
    }

    public function addCalendarEvent(array $attributes): CalendarEvent
    {
        return $this->calendarEvents()->create($attributes);
    }

    public function upcomingEvents(int $limit = 10)
    {
        return $this->calendarEvents()
            ->where('start_at', '>=', now())
            ->orderBy('start_at')
            ->limit($limit)
            ->get();
    }

    public function eventsInRange($from, $to)
    {
        return $this->calendarEvents()
            ->where(function ($q) use ($from, $to) {
                $q->whereBetween('start_at', [$from, $to])
                  ->orWhereBetween('end_at', [$from, $to]);
            })->get();
    }
}
