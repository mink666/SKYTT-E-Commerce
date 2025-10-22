<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BikeFeature extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'bike_id',
        'order',
        'header_title',
        'header_icon_url',
        'body_content',
    ];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
