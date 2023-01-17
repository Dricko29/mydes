<?php

namespace App\Http\Controllers\Blog;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Blog\Category;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Category::query();
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->editColumn('created_at', function ($model) {
                    return Carbon::parse($model->created_at)->format('d-m-Y');
                })
                ->rawColumns(['created_at'])
                ->make(true);
        }
        return view('blog.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('site.blog.categories.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('blog.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Blog\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('site.blog.categories.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Deleted Successfully!')
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'msg' => __('Whoops! Something went wrong.')
            ]);

        }
    }
}