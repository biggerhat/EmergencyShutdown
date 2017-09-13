<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KosTeam extends Model
{
    protected $fillable = [
        'name',
        'password'
    ];

    public function players()
    {
        return $this->hasMany('App\KosPlayer');
    }

    public function getPlayerListAttribute()
    {
        return $this->players->lists('id')->all();
    }


}
