<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Comment;
use Illuminate\Http\Request;

class StatusCommentController extends Controller
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
    public function __invoke(Request $request, Comment $comment)
    {
        if ($comment->status == 2) {
            $comment->forceFill([
                'status' => 1,
            ])->save();
        } else {
            $comment->forceFill([
                'status' => 2,
            ])->save();
        }
        return redirect()->route('site.blog.comments.index')->with('success', __('Data Updated Successfully!'));
    }
}