<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PermohonanSurat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penduduk() : BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    } 
    public function surat() : BelongsTo
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    } 
}