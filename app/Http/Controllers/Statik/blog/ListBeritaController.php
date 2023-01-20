<?php

namespace App\Http\Controllers\Statik\Blog;

use App\Models\Blog\Tag;
use App\Models\Blog\Blog;
use Illuminate\Http\Request;
use App\Models\Blog\Category;
use App\Http\Controllers\Controller;

class ListBeritaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tags = Tag::all();
        $category = Category::all();
        $blogs = Blog::with(['category', 'tags', 'creator', 'comments' => function ($q) {
            $q->where('status', 2);
        }])->cari($request->cari_blog)->published()->latest()->paginate(3);
        return view('pages.blog.list-blog', compact('blogs', 'category', 'tags'));
    }
}