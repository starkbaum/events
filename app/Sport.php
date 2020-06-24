<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Sport extends Model
{
    protected $guarded = [];

    /**
     * Returns an array with allowed colors
     *
     * @return array
     */
    public static function getColors()
    {
        return [
            'red' => 'Rot',
            'orange' => 'Orange',
            'yellow' => 'Gelb',
            'green' => 'Grün',
            'teal' => 'Türkis',
            'blue' => 'Blau',
            'indigo' => 'Indigo',
            'purple' => 'Violett',
            'pink' => 'Pink',
        ];
    }

    /**
     *
     */
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
