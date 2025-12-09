<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeFeatures extends Model
{
    use HasFactory;

    /**
     * If your migration file did NOT include $table->timestamps(),
     * you must set this to false. Based on our previous steps,
     * we didn't include timestamps for features.
     */
    public $timestamps = false;

    protected $fillable = [
        'bike_id',
        'order',
        'header_title',
        'header_icon_url',
        'body_content',
    ];

    /**
     * Get the bike that owns the feature.
     */
    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
