<?php

namespace App\Http\Controllers\Blog;

use Carbon\Carbon;
use App\Models\Blog\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->status;
            $model = Blog::with(['category', 'tags', 'creator'])->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            });
            return DataTables::eloquent($model)
            ->addIndexColumn()
            ->addColumn('tags', function(Blog $query){
                $tag = '';
                $warna = collect(['info', 'primary', 'warning', 'success', 'danger']);
                foreach ($query->tags as $item) {
                    $tag .= '<tr><span class="badge bg-' . $warna->random() . ' me-1">' . $item->nama . '</span></tr>';
                }
                return $tag;
            })
            ->editColumn('status', function($model){
                if($model->status == 1){
                    return '<span class="badge bg-success">Publis</span>';
                }elseif ($model->status == 2) {
                    return '<span class="badge bg-warning">Pending</span>';
                }elseif ($model->status == 3) {
                    return '<span class="badge bg-danger">Draft</span>';
                }
            })
            ->editColumn('category.nama', function($model){
                    $warna = collect(['info', 'primary', 'warning', 'success', 'danger']);
                    return '<span class="badge bg-'.$warna->random().'">'.$model->category->nama.'</span>';
                })
            ->editColumn('created_at', function ($model) {
                return Carbon::parse($model->created_at)->format('d-m-Y');
            })
            ->rawColumns(['created_at', 'category.nama', 'tags', 'status'])
            ->make(true);
        }
        return view('blog.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); 
        $tags = Tag::all();
        return view('blog.blog.create', compact('categories', 'tags')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
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