<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FdraftPlayer extends Model
{
    protected $fillable = [
        'name',
        'aka',
        'profile',
        'cost',
        'score',
        'fan_draft_id'
    ];

    public function teams()
    {
        return $this->belongsToMany('App\FdraftTeam');
    }

    public function draft()
    {
        return $this->belongsTo('App\FanDraft');
    }
}
