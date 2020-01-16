<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $fillable = ['name', 'rating', 'category', 'image', 'reputation', 'price', 'availability'];

    public $timestamps = false;

    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
