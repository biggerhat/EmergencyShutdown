<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnrCard extends Model
{
    protected $fillable = [
        'title',
        'type',
        'side',
        'keywords',
        'set',
        'rarity',
        'artist',
        'text',
        'cost',
        'memory',
        'diff',
        'agenda',
        'strength',
        'trash',
        'image',
        'rulings',
        'errata'
    ];
}
