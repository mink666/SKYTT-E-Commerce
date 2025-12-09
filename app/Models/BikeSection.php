<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BikeSection extends Model
{
    protected $guarded = [];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }

    public function items()
    {
        return $this->hasMany(BikeSectionItem::class, 'section_id')->orderBy('sort_order');
    }
}
