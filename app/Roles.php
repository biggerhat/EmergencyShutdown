<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
