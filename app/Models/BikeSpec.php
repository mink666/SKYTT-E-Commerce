<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BikeSpec extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
