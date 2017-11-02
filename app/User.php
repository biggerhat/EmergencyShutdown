<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'name', 'location'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function articles()
    {
      return $this->hasMany('App\Article');
    }

    public function fdraftteams()
    {
        return $this->hasMany('App\FdraftTeam');
    }

    public function hof_news()
    {
        return $this->hasMany('App\HofNews');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function getRoleListAttribute()
    {
        return $this->roles->lists('id')->all();
    }

    public function hasRole($check)
    {
        return in_array($check, array_pluck($this->roles->toArray(), 'name'));
    }
}
