<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BikeSectionItem extends Model
{
    protected $guarded = [];

    protected $casts = [
        'bullets' => 'array',
    ];

    public function section()
    {
        return $this->belongsTo(BikeSection::class, 'section_id');
    }
}
