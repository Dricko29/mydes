<?php

namespace App\Http\Controllers\Blog\Slug;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SlugController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // New version: to generate unique slugs
        $slug = SlugService::createSlug(Tag::class, 'slug', $request->nama);

        return response()->json(['slug' => $slug]);
    }
}