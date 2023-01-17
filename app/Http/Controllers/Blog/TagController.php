<?php

namespace App\Http\Controllers\Blog;

use Carbon\Carbon;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Tag::query();
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->editColumn('created_at', function ($model) {
                    return Carbon::parse($model->created_at)->format('d-m-Y');
                })
                ->rawColumns(['created_at'])
                ->make(true);
        }
        return view('blog.tag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        Tag::create($request->validated());
        return redirect()->route('site.blog.tags.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('blog.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Blog\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('site.blog.tags.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!')
        ]);
    }
}