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
     *
     * @return string
     */
    public function getFormattedDate(): string
    {
        $formattedDate = '';

        $date = Carbon::create($this->date);

        $formattedDate = $date->format('d.m.Y') . ' ' . $this->time;


        return $formattedDate;
    }

    /**
     * Returns the day as string
     *
     * @return string
     */
    public function getDay(): string
    {
        return Carbon::create($this->date)->day;
    }

    /**
     * Returns the shortened month as string
     *
     * @return string
     */
    public function getMonth(): string
    {
        return Carbon::create($this->date)->locale('de')->shortMonthName;
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class, '_sport_id', 'id');
    }
}
