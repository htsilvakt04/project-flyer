<?php

namespace App;
use Topic;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function flyers()
    {
      return $this->hasMany(Flyer::class);
    }
    public function owns(Flyer $flyer)
    {
      return $this->id == $flyer->user_id;
    }
    public function publish(Flyer $flyer)
    {
    
      return $this->flyers()->save($flyer);
    }
}
