<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FanDraft extends Model
{
    protected $fillable = [
        'name',
        'description',
        'scoring',
        'creds',
        'all_creds',
        'team_lim',
        'all_team',
        'elite',
        'writeins',
        'writein_value',
        'open',
        'complete'
    ];

    public function players()
    {
        return $this->hasMany('App\FdraftPlayer');
    }

    public function teams()
    {
        return $this->hasMany('App\FdraftTeam');
    }


}
