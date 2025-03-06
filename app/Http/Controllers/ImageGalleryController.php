<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

\Unsplash\HttpClient::init(
    [
        'applicationId' => env('UNSPLASH_ACCESS_KEY'),
        'secret' => env('UNSPLASH_SECRET_KEY'),
        'utmSource' => env('UNSPLASH_APP_NAME')
    ]
);

class ImageGalleryController extends Controller
{
    public function index()
    {
        return $this->showGallery('cats', 10, 'landscape');
    }

    public function search(Request $request)
    {
        return $this->showGallery($request->search, $request->count, $request->orientation);
    }

    private function showGallery($search, $count, $orientation)
    {
        $page = 1;
        $collections = "";

        $results = \Unsplash\Search::photos($search, $page, $count, $orientation, $collections);
        $images = $results->getResults();
        return view('image-gallery', compact('images', 'search', 'count', 'orientation'));
    }
}
