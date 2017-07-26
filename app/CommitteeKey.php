<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommitteeKey extends Model
{
    protected $fillable = [
        'id',
        'name',
        'key',
        'ballot'
    ];
}
