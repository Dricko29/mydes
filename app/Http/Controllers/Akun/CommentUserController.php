<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Blog\Comment;
use Illuminate\Http\Request;

class CommentUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreCommentRequest $request)
    {
        try {
            Comment::create($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Whoops! Something went wrong.'));
        }
        return redirect()->back()->with('success', __('Komentar berhasil dikirim'));
    }
}