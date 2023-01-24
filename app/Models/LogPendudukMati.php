<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogPendudukMati extends Model
{
    use HasFactory;
    use Userstamps;

    protected $guarded = ['id'];

    public function penduduk() : BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}