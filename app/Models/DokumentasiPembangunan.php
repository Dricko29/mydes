<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumentasiPembangunan extends Model
{
    use HasFactory;
    use Userstamps;

    protected $guarded = ['id'];

    public function pembangunan(): BelongsTo
    {
        return $this->belongsTo(Pembangunan::class, 'pembangunan_id');
    }
}