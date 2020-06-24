<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
