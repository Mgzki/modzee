<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Gallery;
use App\Models\Photographer;
use Illuminate\Database\Seeder;

class PhotographerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For normal use cases (ie. where a json file is not provided), generates a photographer, 1 gallery for that photographer, and 6 photos belonging to that gallery
        $photographer = Photographer::factory()->create();
        $gallery = Gallery::factory()->create([
            'photographer_id' => $photographer->id,
        ]);
        Photo::factory(6)->create([
            'gallery_id' => $gallery->id,
        ]);

    }
}
