<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'vote',
        'ballot',
        'voter_id',
        'committee_id'
    ];

}
