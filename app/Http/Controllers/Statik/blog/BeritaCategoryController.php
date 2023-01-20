<?php

namespace App\Http\Controllers\Statik\Blog;

use Illuminate\Http\Request;
use App\Models\Blog\Category;
use App\Http\Controllers\Controller;

class BeritaCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categoryBlogs = $category->blogs()->published()->latest()->paginate(6);
        return view('pages.blog.blog-category', compact('category','categoryBlogs'));
    }
}