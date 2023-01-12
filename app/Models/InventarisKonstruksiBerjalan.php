<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventarisKonstruksiBerjalan extends Model
{
    use HasFactory;
    use Userstamps;
    use HasFormatRupiah;

    protected $guarded = ['id'];

    public function invAsal(): BelongsTo
    {
        return $this->belongsTo(InvAsal::class, 'asal_id');
    }

    public function invStatusTanah(): BelongsTo
    {
        return $this->belongsTo(InvStatusTanah::class, 'status_tanah_id');
    }

    public function invFisikBangunan(): BelongsTo
    {
        return $this->belongsTo(InvFisikBangunan::class, 'fisik_bangunan_id');
    }
}