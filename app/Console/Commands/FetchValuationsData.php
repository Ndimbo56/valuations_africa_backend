<?php


namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;


use Illuminate\Console\Command;

class FetchValuationsData extends Command
{
    /**
     * 
     *
     * @var string
     */
    protected $signature = 'app:fetch-valuations-data';

    /**
     * This is trying to fetch the data from the endpoint as instructed ealer.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * 
     */
    public function handle()
    {
{
    $response = Http::withoutVerifying()->get('https://staging.valuationsafrica.mw/api/v2/properties');

    if (!$response->ok()) {
        $this->error('Could not fetch data.');
        return Command::FAILURE;
    }

    $data = $response->json()['data'];

    foreach ($data as $item) {
        $property = \App\Models\Property::updateOrCreate(
            ['external_id' => $item['id']],
            [
                'owner_name' => $item['owner_name'],
                'property_design' => $item['property_design'],
             'construction_stage' => $item['construction_stage'],
                'year_built' => $item['year_built'],
              'measurements' => $item['measurements'],
                'no_rooms' => $item['no_rooms'],
                   'no_of_bathrooms' => $item['no_of_bathrooms'],
                'attributes' => $item['attributes'],
                'description' => $item['description'],
                'master_bedroom_ensuite' => $item['master_bedroom_ensuite'],
        'building_size' => $item['building_size'],
                'bulding_size_unit' => $item['bulding_size_unit'],
                'land_size' => $item['land_size'],
                'land_size_unit' => $item['land_size_unit'],
                'price' => $item['price'],
            'listing_type' => $item['listing_type'],
                'is_approved' => $item['is_approved'],
            ]
        );

        if (isset($item['location'])) {
            $property->location()->updateOrCreate([], [
                'region' => $item['location']['region'] ?? null,
                'district' => $item['location']['district'] ?? null,
            'area' => $item['location']['area'] ?? null,
                'sub_area' => $item['location']['sub_area'] ?? null,
         'postcode' => $item['location']['postcode'] ?? null,
                'latitude' => $item['location']['latitude'] ?? null,
            'longitude' => $item['location']['longitude'] ?? null,
                'zone_category' => $item['location']['zone_category'] ?? null,
            'zoning' => $item['location']['zoning'] ?? null,
                'google_map_link' => $item['location']['google_map_link'] ?? null,
            ]);
        }

        if (isset($item['cover_photo'])) {
            $property->coverPhoto()->updateOrCreate([], [
                   'url' => $item['cover_photo']['url'],
            'description' => $item['cover_photo']['description'],
            ]);
        }
    }

    $this->info('Fetched and stored property data successfully.');
          return Command::SUCCESS;
}

    }
}
