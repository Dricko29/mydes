<?php

namespace App\Http\Controllers\Blog\Slug;

use App\Models\Blog\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BlogSlugController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // New version: to generate unique slugs
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->judul);

        return response()->json(['slug' => $slug]);
    }
}