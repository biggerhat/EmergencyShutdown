<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $fillable = [
        'voter_ip',
        'committee_id',
        'ballot'
    ];

    public function ballot()
    {
        return $this->belongsTo('App\Ballot');
    }
}
