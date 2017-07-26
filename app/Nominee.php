<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    //
    protected $fillable = [
        'name',
        'alias',
        'standings',
        'description'
    ];

    public function ballots()
    {
        return $this->belongsToMany('App\Ballot');
    }
}
