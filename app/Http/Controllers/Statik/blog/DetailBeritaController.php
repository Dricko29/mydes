<?php

namespace App\Http\Controllers\Statik\Blog;

use App\Models\Blog\Tag;
use App\Models\Blog\Blog;
use Illuminate\Http\Request;
use App\Models\Blog\Category;
use App\Http\Controllers\Controller;

class DetailBeritaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $slug)
    {
        $tags = Tag::all();
        $category = Category::all();
        $blog = Blog::with(['comments' => function($q){
            $q->where('status',2);
        }])->where('slug', $slug)->published()->firstOrFail();
        return view('pages.blog.blog-detail', compact('blog', 'category', 'tags'));
    }
}