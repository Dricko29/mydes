<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $fillable = ['nama', 'slug'];

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function blogs() : BelongsToMany
    {
        return $this->belongsToMany(Blog::class, 'blog_tag', 'tag_id', 'blog_id');
    }
}