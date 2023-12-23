<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUrlRequest;
use App\Http\Resources\V1\UrlResource;

use function Laravel\Prompts\error;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            'orignalUrl' => 'fd',
            'shortUrl' => 1
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUrlRequest $request)
    {
        if(Url::where('original_url', $request->original_url)->exists()) {
            return new UrlResource(Url::where('original_url', $request->original_url)->first());
        }
        if(Url::where('short_url', 1)->exists()) {
            $latestShortUrl = Url::latest()->first()->short_url;
            $latestShortUrl = $latestShortUrl + 1;
            return new UrlResource(Url::create([
                'original_url' => $request->original_url,
                'short_url' => $latestShortUrl
            ]));    
        }
        return new UrlResource(Url::create([
            'original_url' => $request->original_url,
            'short_url' => 1
        ]));  
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        return redirect($url->original_url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        //
    }
}
