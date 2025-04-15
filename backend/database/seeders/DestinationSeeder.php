<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    public function run()
    {
        $destinations = [
            [
                'name' => 'Eiffel Tower',
                'slug' => 'paris',
                'description' => 'Experience the romance and charm of the City of Light.',
                'image_path' => '/images/destinations/paris.jpg',
                'price' => 120.00,
                'location' => 'Paris, France',
                'rating' => 4.8
            ],
            [
                'name' => 'Dubai Skyline',
                'slug' => 'dubai',
                'description' => 'Explore the modern marvel that is Dubai.',
                'image_path' => '/images/destinations/dubai.jpg',
                'price' => 180.00,
                'location' => 'Dubai, UAE',
                'rating' => 4.9
            ],
            [
                'name' => 'Grand Canal',
                'slug' => 'venice',
                'description' => 'Discover the romantic waterways of Venice.',
                'image_path' => '/images/destinations/venice.jpg',
                'price' => 150.00,
                'location' => 'Venice, Italy',
                'rating' => 4.7
            ],
            // Add more destinations here...
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}