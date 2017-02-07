<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Article
 * @package App
 */
class Article extends Model
{
    protected $fillable = [
      'title',
      'body',
      'user_id',
      'summary',
      'published_at'
    ];

    protected $dates = ['published_at'];

    public function scopePublished($query)
    {
      $query->where('published_at', '<=', Carbon::now());
    }


    /**
     * @param $date
     */
    public function setPublishedAtAttribute ($date)
    {
      $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
