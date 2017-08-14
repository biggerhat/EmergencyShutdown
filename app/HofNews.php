<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HofNews extends Model
{
    protected $fillable = [
        'title',
        'news',
        'user_id',
    ];

        public function user()
        {
            return $this->belongsTo('App\User');
        }
}
