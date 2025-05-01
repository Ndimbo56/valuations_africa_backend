<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    // Add the necessary fields to the fillable property
    protected $fillable = [
        'region',
        'district',
        'area',
        'sub_area',
        'postcode',
        'latitude',
        'longitude',
        'zone_category',
        'zoning',
        'google_map_link',
        // Add any other fields that should be mass-assigned
    ];
}
