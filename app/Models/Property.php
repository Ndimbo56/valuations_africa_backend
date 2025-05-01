<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // Add the external_id and other relevant fields to the fillable property
    protected $fillable = [
        'external_id', 
        'owner_name',
        'property_design',
        'construction_stage',
        'year_built',
        'measurements',
        'no_rooms',
        'no_of_bathrooms',
        'attributes',
        'description',
        'master_bedroom_ensuite',
        'building_size',
        'bulding_size_unit',
        'land_size',
        'land_size_unit',
        'price',
        'listing_type',
        'is_approved',
        // Add any other fields that should be mass-assigned
    ];

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function coverPhoto()
    {
        return $this->hasOne(CoverPhoto::class);
    }
}
