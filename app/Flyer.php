<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $fillable = [
      "street",
      "city",
      "zip",
      "country",
      "state",
      "price",
      "description",
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public static function locatedAt($zip, $street)
    {
      $street = str_replace("-", " ", $street);
      return static::where(compact("zip", "street"))->firstOrFail();
    }

    public function addPhoto(Photo $photo)
    {
      return $this->photos()->save($photo);
    }


    public function photos()
    {
      return $this->hasMany(Photo::class);
    }
    public function onwer()
    {
      return $this->belongsTo(User::class, "user_id");
    }
    public function ownedBy(User $user)
    {
      return $this->user_id == $user->id;
    }
}
