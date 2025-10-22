<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory
;
class Bike extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_release',
        'description',
    ];

    public function variants()
    {
        return $this->hasMany(BikeVariants::class);
    }

    public function features()
    {
        return $this->hasMany(BikeFeature::class);
    }
}
