<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FdraftWritein extends Model
{
    protected $fillable = [
        'name',
        'fan_draft_id'
    ];

    public function draft()
    {
        return $this->belongsTo('App\FanDraft');
    }
}
