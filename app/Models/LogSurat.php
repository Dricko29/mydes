<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Wildside\Userstamps\Userstamps;

class LogSurat extends Model
{
    use HasFactory;
    use Userstamps;
    
    protected $guarded = ['id'];

    public function penduduk() : BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
    
    public function surat() : BelongsTo
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }
    
    public function pegawai() : BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
    
    public function nomorSurat() : HasOne
    {
        return $this->hasOne(NomorSurat::class, 'log_surat_id');
    }
}