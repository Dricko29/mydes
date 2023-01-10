<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RukunTetangga extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function attrKelamins(): BelongsTo
    {
        return $this->belongsTo(AttrKelamin::class);
    }

    public function rukunWargas(): BelongsTo
    {
        return $this->belongsTo(RukunWarga::class);
    }
}