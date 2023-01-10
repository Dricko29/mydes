<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pembangunan extends Model
{
    use HasFactory;
    use Userstamps;
    use HasFormatRupiah;

    protected $guarded = ['id'];

    public function sumberDana() : BelongsTo
    {
        return $this->belongsTo(SumberDana::class);
    }

    public function dokumentasiPembangunans() : HasMany
    {
        return $this->hasMany(DokumentasiPembangunan::class);
    }
}