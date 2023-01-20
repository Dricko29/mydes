<?php

namespace App\Http\Controllers\Blog\Slug;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategorySlugController extends Controller
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
        $slug = SlugService::createSlug(Category::class, 'slug', $request->nama);

        return response()->json(['slug' => $slug]);
    }
}