<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KosPlayer extends Model
{
    protected $fillable = [
        'name',
        'kos_team_id',
        'aka',
        'pref_corp',
        'pref_runn',
        'free_agent'
    ];


    public function team()
    {
        return $this->belongsTo('App\KosTeam');
    }
}
