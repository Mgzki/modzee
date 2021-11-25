<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotographerResource;
use App\Models\Photo;
use App\Models\Gallery;
use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotographerController extends Controller
{
    public function index()
    {
        // Only 1 Photographer and 1 album in this example, so we can use 'first()'
        // Otherwise we would need to check to ensure the gallery belongs to the given photographer, as well as that the photos belong to the given album 
        // (and only display those that do). This would be done by ensuring foreign keys match
        $photographer = Photographer::first();
        $gallery = Photo::where('photos.gallery_id', '=', Gallery::first()->id)->get();
        
        $photographer->album = $gallery;
        return response($photographer);
    }
}
