<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FdraftTeam extends Model
{
    protected $fillable = [
        'user_id',
        'fan_draft_id',
        'name',
        'elite',
        'cost',
        'score'
    ];

    public function players()
    {
        return $this->belongsToMany('App\FdraftPlayer');
    }

    public function draft()
    {
        return $this->belongsTo('App\FanDraft');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
