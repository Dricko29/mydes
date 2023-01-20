<?php  

namespace App\Services;

use App\Models\Blog\Blog;

class BlogDataService
{
    private $blog;
    public function __construct()
    {
        $this->blog = Blog::all();
    }
    public function getDataJmlPost()
    {
        $jmlPost = $this->blog->count();
        return $jmlPost;
    }
    public function getDataJmlPostPublished()
    {
        $jmlPostPublished = $this->blog->where('status',1)->count();
        return $jmlPostPublished;
    }
    public function getDataJmlPostPending()
    {
        $jmlPostPending = $this->blog->where('status',2)->count();
        return $jmlPostPending;
    }
    public function getDataJmlPostDraft()
    {
        $jmlPostDraft = $this->blog->where('status',3)->count();
        return $jmlPostDraft;
    }

}