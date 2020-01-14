<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = ['city', 'state', 'zip_code', 'country', 'address'];
    public $timestamps = false;

    public function hotels()
    {
        return $this->belongsTo(Hotel::class);
    }
}
