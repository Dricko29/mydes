<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function blog() : BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    // cek status
    public function scopeStatus($query, $value)
    {
        $query->when($value, function ($query) use ($value) {
            $query->where('status', $value);
        });
    }
}