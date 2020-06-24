<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sport;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    protected $guarded = [];


    /**
     * Returns the date as formatted string
     */
    public function getFormattedDate(): string
    {
        $formattedDate = '';

        $date = Carbon::create($this->date);

        $formattedDate = $date->format('d.m.Y') . ' ' . $this->time;


        return $formattedDate;
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class, '_sport_id', 'id');
    }
}
