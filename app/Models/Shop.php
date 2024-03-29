<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Genre;
use App\Models\Area;



class Shop extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'information',
  ];

  public function owner()
  {
    return $this->belongsTo(Owner::class);
  }

  public function area()
  {
    return $this->belongsTo(Area::class);
  }
  public function genre()
  {
    return $this->belongsTo(Genre::class);
  }
  public function image()
  {
    return $this->hasOne(Image::class);
  }

  public function favoritedBy()
  {
    return $this->belongsToMany(User::class, 'favorites');
  }
  public function reservations()
  {
    return $this->hasMany(Reservation::class);
  }

  public function reviews()
  {
      return $this->hasMany(Review::class);
  }
}
