<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeVariant extends Model
{
    use HasFactory;

    protected $table = 'bike_variants';

    protected $fillable = [
        'bike_id',
        'color_name',
        'image_url',
        'feature_image_url',
        'price',
    ];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
