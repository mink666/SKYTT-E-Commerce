<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Fixed semicolon placement

class Bike extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
    public function features()
    {
        return $this->hasMany(BikeFeatures::class)->orderBy('order');
    }
    public function variants()
    {
        // CHANGE: BikeVariant::class to BikeVariant::class
        return $this->hasMany(BikeVariant::class);
    }

    public function sections()
    {
    return $this->hasMany(BikeSection::class)->orderBy('sort_order');
    }

    public function specs()
    {
        return $this->hasMany(BikeSpec::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
