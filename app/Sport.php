<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Sport extends Model
{
    protected $guarded = [];

    public static function colorIsValid(string $color): bool
    {
        $colors = [
            'red',
            'orange',
            'yellow',
            'green',
            'teal',
            'blue',
            'indigo',
            'purple',
            'pink',
        ];

        return in_array($color, $colors);
    }

    public function events()
    {
        return $this->hasMany(Event::class, '_sport_id', 'id');
    }
}
