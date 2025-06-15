<?php

namespace App\Models;

use App\Traits\HasCalendar;
use Illuminate\Database\Eloquent\Model;

class Dummy extends Model
{
    use HasCalendar;

    protected $fillable = ['name'];
}
