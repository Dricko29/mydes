<?php

namespace App\Http\Controllers\Statik\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;

class BeritaTagController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $tagBlogs = $tag->blogs()->published()->latest()->paginate(6);
        return view('pages.blog.blog-tag', compact('tag', 'tagBlogs'));
    }
}