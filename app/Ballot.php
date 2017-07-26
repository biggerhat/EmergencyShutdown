<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    protected $fillable = [
        'name',
        'description',
        'closed'
    ];

    public function nominees()
    {
        return $this->belongsToMany('App\Nominee');
    }

    public function getNomineeListAttribute()
    {
        return $this->nominees->lists('id')->all();
    }
}
