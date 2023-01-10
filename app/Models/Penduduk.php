<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Wildside\Userstamps\Userstamps;

class Penduduk extends Model
{
    use HasFactory;
    use Userstamps;

    protected $guarded = ['id'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function keluarga() : BelongsTo
    {
        return $this->belongsTo(Keluarga::class);
    }
    public function attrKelamin() : BelongsTo
    {
        return $this->belongsTo(AttrKelamin::class);
    }
    public function attrAgama() : BelongsTo
    {
        return $this->belongsTo(AttrAgama::class);
    }
    public function attrStatus() : BelongsTo
    {
        return $this->belongsTo(AttrStatus::class);
    }
    public function attrStatusDasar() : BelongsTo
    {
        return $this->belongsTo(AttrStatusDasar::class);
    }
    public function attrPendidikan() : BelongsTo
    {
        return $this->belongsTo(AttrPendidikan::class);
    }
    public function attrPendidikanKeluarga() : BelongsTo
    {
        return $this->belongsTo(AttrPendidikanKeluarga::class);
    }
    public function attrHubungan() : BelongsTo
    {
        return $this->belongsTo(AttrHubungan::class);
    }
    public function attrHubunganKeluarga() : BelongsTo
    {
        return $this->belongsTo(AttrHubunganKeluarga::class);
    }
    public function attrBahasa() : BelongsTo
    {
        return $this->belongsTo(AttrBahasa::class);
    }
    public function attrGolonganDarah() : BelongsTo
    {
        return $this->belongsTo(AttrGolonganDarah::class);
    }
    public function attrPekerjaan() : BelongsTo
    {
        return $this->belongsTo(AttrPekerjaan::class);
    }
    public function attrStatusKawin() : BelongsTo
    {
        return $this->belongsTo(AttrStatusKawin::class);
    }
    public function attrSuku() : BelongsTo
    {
        return $this->belongsTo(AttrSuku::class);
    }
    public function attrWarganegara() : BelongsTo
    {
        return $this->belongsTo(AttrWarganegara::class);
    }
    public function dusun() : BelongsTo
    {
        return $this->belongsTo(Dusun::class);
    }
    public function rukunWarga() : BelongsTo
    {
        return $this->belongsTo(RukunWarga::class);
    }
    public function rukunTetangga() : BelongsTo
    {
        return $this->belongsTo(RukunTetangga::class);
    }

    public function logPendudukMasuk() : BelongsTo
    {
        return $this->belongsTo(LogPendudukMasuk::class);
    }
    
    public function logPendudukLahir() : BelongsTo
    {
        return $this->belongsTo(LogPendudukLahir::class);
    }
}