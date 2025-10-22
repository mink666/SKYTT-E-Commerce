<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BikeVariants extends Model
{
    use HasFactory;
    protected $fillable = [
        'bike_id',
        'color_name',
        'image_url',
        'price',
    ];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
