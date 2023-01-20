<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $fillable = ['nama', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function blogs() : HasMany
    {
        return $this->hasMany(Blog::class);
    }

    // cek status
    public function scopeStatus($query, $value)
    {
        $query->when($value, function ($query) use ($value) {
            $query->where('status', $value);
        });
    }

}