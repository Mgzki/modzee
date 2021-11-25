<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Gallery;
use App\Models\Photographer;
use Illuminate\Database\Seeder;
use Database\Seeders\PhotographerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // To instead use the photographer seeder for random data, uncomment the following line
        // $this->call(PhotographerSeeder::class);

        // Read json from the uploaded file
        $json = file_get_contents(base_path('storage/landscapes.json'));
        $data = json_decode($json, true);

        // Creates a photographer with data from the provided json
        $photographer = Photographer::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'bio' => $data['bio'],
            'profile_picture' => $data['profile_picture'],
            'password' => 'password',
        ]);

        // Creates a gallery such that it belongs to the above photographer, associated by foreign key (photographer_id)
        $gallery = Gallery::create([
            'photographer_id' => $photographer->id
        ]);
        $photographer->galleries()->save($gallery);

        // Creates images such that each belongs to the above gallery, associated by foreign key (gallery_id)
        foreach($data['album'] as $image) {
            $photo = Photo::create([
                'title' => $image['title'],
                'description' => $image['description'],
                'img' => $image['img'],
                'date' => $image['date'],
                'featured' => $image['featured'],
                'gallery_id' => $gallery->id,
            ]);
            $gallery->photos()->save($photo);
        }
    }
}
