<?php

namespace App\Models\Blog;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;
    use Userstamps;
    use Sluggable;
    protected $guarded = ['id'];


    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'blog_tag', 'blog_id', 'tag_id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    // cek status
    public function scopeStatus($query, $value)
    {
        $query->when($value, function ($query) use ($value) {
            $query->where('status', $value);
        });
    }
    
    public function scopePublished($query)
    {
        $query->where('status', 1);
    }
    // guest
    public function scopeCari($query, $value)
    {
        $query->when($value, function ($query) use ($value) {
            $query->where('judul','like', '%'.$value.'%');
        });
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }
}